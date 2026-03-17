<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',

        // snapshot
        'product_name',
        'sku',

        // pricing
        'quantity',
        'price',
        'total',

        // variant
        'variant',

        // extra
        'notes',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->price, 2);
    }

    public function getFormattedTotalAttribute()
    {
        return '₹' . number_format($this->total, 2);
    }
}