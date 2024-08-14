<?php

namespace App\Livewire\Frontend\Product;

use Livewire\Component;

class RelatedProducts extends Component
{
    public $products;

    public function render()
    {
        return view('livewire.frontend.product.related-products');
    }
}
