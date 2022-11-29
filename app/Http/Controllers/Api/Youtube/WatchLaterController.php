<?php

namespace App\Http\Controllers\Api\Youtube;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class WatchLaterController extends Controller
{
    //TODO in the choosing mode it can return videos with categories already,
    // logic is too different
    public function get(Request $request)
    {
        $categories = $request->get('categories');
        if ($categories) {

//            return response()->json();
            $videos = Video::whereHas('categories', function ($builder) use ($categories) {
                $builder->whereIn('category_id', $categories);
            })->get();
            return response()->json($videos);
        }

        return response()->json(Video::whereDoesntHave('categories')->get());
    }
    public function parseFromHtml(Request $request)
    {
        /** @var UploadedFile $file */
        $file = $request->files->get('html');
        $data = file_get_contents($file->getRealPath());
//        file_put_contents(__DIR__ . '/check.txt', $data);
//        dd();
        $start = mb_strpos($data, '<ytd-playlist-video-list-renderer');
        $data = mb_substr($data, $start, mb_strpos($data, '</ytd-playlist-video-list-renderer>') - $start);
//        file_put_contents(__DIR__ . '/check.txt', $data);

        preg_match_all(
            '/<ytd-playlist-video-renderer.*?>.*?' .
            '<img.*?src="(.*?)">.*?' .
            '<a.*?id="video-title".*?href="(.*?)".*?>(.*?)<\/a>.*?' .
            '<ytd-channel-name.*?>.*?<a.*?href="(.*?)".*?>(.*?)<\/a>.*?<\/ytd-channel-name>.*?' .
            '<\/ytd-playlist-video-renderer>/s',
            $data, $matches, PREG_SET_ORDER);
        /** @var User $user */
        $user = auth()->user();
        $all = [];
        foreach ($matches as $match) {
            $all[] = [
                'thumbnail' => trim($match[1]),
                'real_id' => str_replace(
                    config('youtube.watch_url'), '', explode('&', $match[2])[0]
                ),
                'title' => trim($match[3]),
                'author_id' => str_replace(
                    config('youtube.url'), '', explode('&', $match[4])[0]
                ),
                'author_title' => trim($match[5]),
                'user_id' => $user->id
            ];
        }
        Video::where('user_id', $user->id)->delete();
        Video::insert($all);
    }
}
