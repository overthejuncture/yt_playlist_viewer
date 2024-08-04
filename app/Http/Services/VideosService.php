<?php

namespace App\Http\Services;

use App\Models\Video;

class VideosService
{
    public function parseVideoLinkFromFullLink(string $link)
    {
        $link = str_replace(
            config('youtube.watch_url'), '', explode('&', $link)[0]
        );
        return $link;
    }

    public function saveVideos(array $data)
    {
        /** @var User $user */
        $user = auth()->user();
        $all = [];
        foreach ($data as $row) {
            $videoLink = $this->parseVideoLinkFromFullLink($row['videoLink']);
            $all[] = [
                'thumbnail' => 'https://i.ytimg.com/vi/' . $videoLink . '/hqdefault.jpg', // todo add thumbnail parsing
                'real_id' => $videoLink,
                'title' => $row['videoTitle'],
                'author_id' => str_replace(
                    config('youtube.url'), '', $row['channelLink']
                ),
                'author_title' => trim($row['channelTitle']),
                'user_id' => $user->id,
                'is_watch_later' => true
            ];
        }
        // Video::where('user_id', $user->id)->delete();
        Video::upsert($all, ['real_id', 'user_id'], ['thumbnail']);
    }
}
