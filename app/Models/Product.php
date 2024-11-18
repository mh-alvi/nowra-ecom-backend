<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'image',
        'size',
        'price',
        'coupon',
        'discount_price',
        'status',
        'product_code',
    ];

    // Define a relationship to the Stock model, assuming each product belongs to a stock
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}
