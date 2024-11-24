<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartSideBar extends Component
{
    public $carts;


    protected $listeners = ['cartUpdated' => 'checkCartUpdate'];

    public function checkCartUpdate(){
        if(Auth::check()){
        $this->carts = Cart::where('user_id', Auth::id())->get();
        }else{
            $this->carts = Cart::where('session_id', Session::id())->get();
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
        return view('livewire.frontend.cart.cart-side-bar', [
            'carts' => $this->carts
        ]);
    }
}
