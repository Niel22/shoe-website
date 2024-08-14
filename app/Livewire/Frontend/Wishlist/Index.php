<?php

namespace App\Livewire\Frontend\Wishlist;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{

    public function addToCart($product_id)
    {
        $product = Product::where('id', $product_id)->first();

        return $this->redirect('/collection/'.$product->category->slug . '/' . $product->slug);
    }

    public function delete($id)
    {
        $wishlist = Wishlist::where('id', $id)->first();

        $wishlist->delete();

        $this->dispatch('wishlistUpdated');

        session()->flash('toast-message', "Product Deleted from wishlist");
    }


    public function render()
    {
        if (Auth::check()) {
            $wishlists = Wishlist::where('user_id', Auth::id())->get();
        } else {
            $wishlists = Wishlist::where('session_id', Session::id())->get();
        }

        return view('livewire.frontend.wishlist.index', compact('wishlists'));
    }
}
