<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];

    public function products(){

        return $this->hasMany(Product::class, 'category_id', 'id')->where('status', 1)->orderBy('created_at', 'ASC')->select([
            'id',
            'category_id',
            'name',
            'slug',
            'small_description',
            'description',
            'original_price',
            'selling_price',
            'quantity',
            'trending',
            'type',
            'material',
            'style',
            'status',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'created_at',
            'updated_at',
        ]);

    }
}
