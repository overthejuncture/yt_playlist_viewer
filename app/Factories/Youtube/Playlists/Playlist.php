<?php

namespace App\Factories\Youtube\Playlists;

use App\Models\YoutubePlaylist;

class Playlist
{
    public static function create(\App\Dto\Youtube\Playlists\Playlist $data)
    {
        return YoutubePlaylist::create((array) $data);
    }
}