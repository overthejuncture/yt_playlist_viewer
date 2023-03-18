<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\YoutubePlaylist
 *
 * @property int $id
 * @property string $youtube_id
 * @property string $channel_id
 * @property string $status
 * @property int $item_count
 * @property string $title
 * @property string $description
 * @property mixed $thumbnails
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist query()
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist whereItemCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist whereThumbnails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|YoutubePlaylist whereYoutubeId($value)
 */
class YoutubePlaylist extends BaseModel
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
