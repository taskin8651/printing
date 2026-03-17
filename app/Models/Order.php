<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',

        // 👤 customer details
        'name',
        'email',
        'phone',
        'address',

        // 💰
        'total_amount',

        // 📦 status
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS 🔥
    |--------------------------------------------------------------------------
    */

    // total items count
    public function getTotalItemsAttribute()
    {
        return $this->items->sum('quantity');
    }
}