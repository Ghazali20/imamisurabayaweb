<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::saved(fn () => Cache::forget('public_blog_posts'));
        static::deleted(fn () => Cache::forget('public_blog_posts'));
    }
}