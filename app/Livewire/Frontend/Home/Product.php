<?php

namespace App\Livewire\Frontend\Home;

use App\Models\Product as ModelsProduct;
use Livewire\Component;

class Product extends Component
{
    public function render()
    {
        $products = ModelsProduct::where('status', 1)->orderBy('created_at', 'DESC')->limit(8)->get();

        return view('livewire.frontend.home.product', compact('products'));
    }
}
