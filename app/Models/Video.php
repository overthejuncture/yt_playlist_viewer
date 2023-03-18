<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Video
 *
 * @mixin Builder
 * @property int $id
 * @property string $title
 * @property string $real_id
 * @property string $author_id
 * @property string $author_title
 * @property string $user_id
 * @property string|null $thumbnail
 * @property int|null $is_watch_later
 * @property-read \Kalnoy\Nestedset\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @method static Builder|Video newModelQuery()
 * @method static Builder|Video newQuery()
 * @method static Builder|Video query()
 * @method static Builder|Video watchLater()
 * @method static Builder|Video whereAuthorId($value)
 * @method static Builder|Video whereAuthorTitle($value)
 * @method static Builder|Video whereId($value)
 * @method static Builder|Video whereIsWatchLater($value)
 * @method static Builder|Video whereRealId($value)
 * @method static Builder|Video whereThumbnail($value)
 * @method static Builder|Video whereTitle($value)
 * @method static Builder|Video whereUserId($value)
 */
class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'real_id', 'author_id', 'author_title', 'user_id', 'is_watch_later'];

    protected static function booted()
    {
        static::addGlobalScope(function (Builder $builder) {
            /** @phpstan-ignore-next-line */
            $builder->where('user_id', auth()->user()->id);
            $builder->with('categories');
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopeWatchLater($query)
    {
        $query->where('is_watch_later', 1);
    }
}
