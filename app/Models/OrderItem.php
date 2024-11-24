<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',      // Foreign key for the order
        'product_id',    // Foreign key for the product
        'color',         // Color of the product
        'size',          // Size of the product
        'price',         // Price of the product
        'quantity'
    ];

    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
