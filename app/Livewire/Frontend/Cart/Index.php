<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{
    public $carts;


    protected $listeners = ['cartUpdated' => 'checkCartUpdate'];


    public function checkCartUpdate()
    {
        if (Auth::check()) {
            $this->carts = Cart::where('user_id', Auth::id())->get();
        } else {
            $this->carts = Cart::where('session_id', Session::id())->get();
        }
    }

    public function increaseQuantity($cart_id)
    {
        $cartItem = Cart::where('id', $cart_id)->first();

        if ($cartItem->quantity < 10) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + 1
            ]);

            $this->dispatch('cartUpdated');
        }
    }

    public function decreaseQuantity($cart_id)
    {
        $cartItem = Cart::where('id', $cart_id)->first();

        if ($cartItem->quantity > 1) {
            $cartItem->update([
                'quantity' => $cartItem->quantity - 1
            ]);

            $this->dispatch('cartUpdated');
        }
    }

    public function delete($id){
        $cart = Cart::where('id', $id)->first();

        $cart->delete();

        $this->dispatch('cartUpdated');

        session()->flash('toast-message', "Product Deleted from cart");
    }

    public function render()
    {
        $this->checkCartUpdate();
        return view('livewire.frontend.cart.index', [
            'carts' => $this->carts,
            // 'totalPrice' => $this->totalPrice
        ]);
    }
}
