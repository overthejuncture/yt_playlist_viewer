<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title', 'user_id', 'video_id'];

    protected static function booted()
    {
        static::addGlobalScope(function (Builder $builder) {
            $builder->where('user_id', auth()->user()->id);
        });
    }
}
