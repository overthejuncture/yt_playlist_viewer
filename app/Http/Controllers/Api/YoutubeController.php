<?php

namespace App\Http\Controllers\Api;

use App\Dto\Youtube\Playlists\Playlist;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use Google\Service\YouTube;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class YoutubeController extends Controller
{
    public function playlists(): JsonResponse
    {

        return response()->json(['items' => auth()->user()->youtube_playlists()->get()->toArray()]);
    }

    public function categories()
    {
        return response()->json(Category::all());
    }

    public function createCategory(Request $request)
    {
        $title = $request->post('title');
        $video_id = $request->post('video_id');
        Category::create([
            'title' => $title,
            'video_id' => $video_id,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function setCategory(Request $request)
    {
        $video_id = $request->post('video_id');
        $category_id = $request->post('category_id');
        $video = Video::where('id', $video_id)->first();
        $video->categories()->sync($category_id);
    }

    public function parseHtml(Request $request)
    {
        /** @var UploadedFile $file */
        $file = $request->files->get('html');
        $data = file_get_contents($file->getRealPath());
        $start = mb_strpos($data, '<ytd-playlist-video-list-renderer');
        $data = mb_substr($data, $start, mb_strpos($data, '</ytd-playlist-video-list-renderer>') - $start);
        preg_match_all(
            '/<ytd-playlist-video-renderer.*?>.*?' .
            '<a.*?id="video-title".*?href="(.*?)".*?>(.*?)<\/a>.*?' .
            '<ytd-channel-name.*?>.*?<a.*?href="(.*?)".*?>(.*?)<\/a>.*?<\/ytd-channel-name>.*?' .
            '<\/ytd-playlist-video-renderer>/s',
            $data, $matches, PREG_SET_ORDER);
        $user = auth()->user();
        $all = [];
        foreach ($matches as $match) {
            $all[] = [
                'real_id' => str_replace(
                    'https://www.youtube.com/watch?v=', '', explode('&', $match[1])[0]
                ),
                'title' => trim($match[2]),
                'author_id' => str_replace(
                    'https://www.youtube.com/', '', explode('&', $match[3])[0]
                ),
                'author_title' => trim($match[4]),
                'user_id' => $user->id
            ];
        }
        Video::where('user_id', $user->id)->delete();
        Video::insert($all);
    }

    public function watchLaterGet()
    {
        return response()->json(Video::all());
    }

    public function exportPlaylists(YouTube $youtube)
    {
        $result = [];
        $data = $youtube->playlists->listPlaylists(['snippet', 'status', 'contentDetails', 'id'], ['mine' => true]);
        $result = $data->toSimpleObject()->items;

        $nextPageToken = $data->getNextPageToken();
        while ($nextPageToken !== null) {
            $data = $youtube->playlists->listPlaylists(['snippet', 'status', 'contentDetails', 'id'], ['mine' => true, 'pageToken' => $nextPageToken]);
            $nextPageToken = $data->getNextPageToken();
            foreach ($data->toSimpleObject()->items as $item) {
                $result[] = $item;
            }
        }

        foreach ($result as $key => $item) {
            $result[$key] = new Playlist(
                youtube_id: $item->id,
                channel_id: $item->snippet->channelId,
                status: $item->status->privacyStatus,
                item_count: $item->contentDetails->itemCount,
                title: $item->snippet->title,
                description: $item->snippet->description,
                thumbnails: json_encode($item->snippet->thumbnails),
                user_id: auth()->user()->id,
            );
        }

        auth()->user()->youtube_playlists()->delete();

        foreach ($result as $item) {
            \App\Factories\Youtube\Playlists\Playlist::create($item);
        }

        return response()->json(['items' => $result]);
    }
}
