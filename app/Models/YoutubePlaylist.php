<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoutubePlaylist extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'youtube_id',
        'channel_id',
        'status',
        'item_count',
        'title',
        'description',
        'thumbnails',
    ];
}
