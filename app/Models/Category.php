<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
    ];

    // 🔗 Relation
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    // 🖼️ Media
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category_image')->singleFile();
    }
}