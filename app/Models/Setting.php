<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'site_name',
        'phone',
        'email',
        'address',

        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'linkedin',
        'whatsapp',

        'meta_title',
        'meta_description',
        'footer_text'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
        $this->addMediaCollection('favicon')->singleFile();
    }
}