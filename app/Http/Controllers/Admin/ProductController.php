<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }

    public function create(){


        $colors = Color::select(['id', 'name'])->get();

        return view('admin.product.create', compact( 'colors'));
    }

    public function edit($id){

        // $columns = Schema::getColumnListing('products');

        // // Columns to exclude
        // $exclude = ['created_at', 'updated_at', 'meta_title', 'meta_keyword', 'meta_description'];

        // // Filter out the excluded columns
        // $selectedColumns = array_diff($columns, $exclude);

        $product = Product::with('productImages', 'productColors.color', 'category')->where('id', $id)->select([
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
            'status',
            'type',
            'material',
            'style'
        ])->first();

        $categories = Category::select(['id', 'name'])->get();

        $product_color = $product->productColors->pluck('color_id')->toArray();

        $colors = Color::whereNotIn('id', $product_color)->select(['id', 'name'])->get();


        return view('admin.product.edit', compact('product'));
    }
}
