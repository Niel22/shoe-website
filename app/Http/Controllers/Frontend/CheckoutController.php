<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('frontend.checkout.index');
    }

    public function single($product_slug){

        $product = Product::where('slug', $product_slug)->where('status', 1)->first();
        $name = $product->name;
        $cartId = session($product->name.'cart');
        session()->forget(($product->name.'cart'));
        return view('frontend.checkout.single', compact('cartId', 'name'));
    }
}
