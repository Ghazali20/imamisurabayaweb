<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'icon',
        'image',
        'program_date',
    ];

    protected static function booted()
    {
        static::saved(fn () => Cache::forget('public_programs_list'));
        static::deleted(fn () => Cache::forget('public_programs_list'));
    }
}