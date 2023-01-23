<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    public $timestamps = false;

    protected $fillable = ['title', 'user_id', 'video_id'];

    protected static function booted()
    {
        static::addGlobalScope(function (Builder $builder) {
            $builder->where('user_id', auth()->user()->id);
        });
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopeMain($query)
    {
        $query->where('parent_id', null);
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }
}
