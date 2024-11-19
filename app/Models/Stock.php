<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_quantity',
        'damage',
        'return_product',
        'product_id',
    ];

    // Define the relationship with the Product model
    public function product()
    {
        return $this->hasOne(Product::class, 'product_id');
    }
}
