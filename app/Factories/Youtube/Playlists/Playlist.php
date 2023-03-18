<?php

namespace App\Factories\Youtube\Playlists;

use App\Models\YoutubePlaylist;
use Illuminate\Database\Eloquent\Model;

class Playlist
{
    /**
     * @param \App\Dto\Playlists\Playlist $data
     * @return Model|YoutubePlaylist
     */
    public static function create(\App\Dto\Playlists\Playlist $data): Model|YoutubePlaylist
    {
        return (new YoutubePlaylist)->create((array) $data);
    }
}
