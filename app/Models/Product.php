<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',

        'sku',              // ✅ NEW
        'stock',            // ✅ NEW

        'price',            // base price (optional)
        'description',

        'meta_title',       // ✅ SEO
        'meta_description', // ✅ SEO

        'is_featured',      // optional

        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // 💰 Quantity Pricing
    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    // 🎨 Variants
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    /*
    |--------------------------------------------------------------------------
    | MEDIA (Spatie)
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        // single image
        $this->addMediaCollection('product_image')->singleFile();

        // multiple images
        $this->addMediaCollection('product_gallery');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS (HELPFUL 🔥)
    |--------------------------------------------------------------------------
    */

    // lowest price (auto calculate)
    public function getMinPriceAttribute()
    {
        return $this->prices()->min('price') ?? $this->price;
    }

    // total stock check
    public function getInStockAttribute()
    {
        return $this->stock > 0;
    }

    public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}
}