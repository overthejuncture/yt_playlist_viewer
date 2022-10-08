<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoutubePlaylist extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'user_id'];
}
