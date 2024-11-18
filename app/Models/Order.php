<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'order_quantity',
        'order_price',
        'custom_note',
        'status',
        'user_id',
        'product_id',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
