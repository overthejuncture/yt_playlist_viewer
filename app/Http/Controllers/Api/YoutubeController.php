<?php

namespace App\Http\Controllers\Api;

use App\Dto\Youtube\Playlists\Playlist;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use Google\Service\YouTube;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function playlists(): JsonResponse
    {
        return response()->json(['items' => auth()->user()->youtube_playlists()->get()->toArray()]);
    }

    public function exportPlaylists(YouTube $youtube)
    {
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
