<?php

namespace App\Dto\Playlists;

class Playlist
{
    public function __construct(
        public string $youtube_id,
        public string $channel_id,
        public string $status,
        public int    $item_count,
        public string $title,
        public string $description,
        public string $thumbnails,
        public string $user_id,
    )
    {
    }
}
