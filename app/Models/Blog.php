<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// 🔥 Spatie Media
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description'
    ];

    /*
    |--------------------------------------------------------------------------
    | MEDIA COLLECTIONS
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        // ✅ Single featured image
        $this->addMediaCollection('blog_image')->singleFile();

        // 🔥 Optional (future use)
        $this->addMediaCollection('blog_gallery');
    }
}