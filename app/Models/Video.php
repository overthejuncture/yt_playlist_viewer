<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'real_id', 'author_id', 'author_title', 'user_id'];

    protected static function booted()
    {
        static::addGlobalScope(function (Builder $builder) {
            $builder->where('user_id', auth()->user()->id);
        });
    }
}
