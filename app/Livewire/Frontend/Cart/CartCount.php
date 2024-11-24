<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartCount extends Component
{

    public $cartCount;

    protected $listeners = ['cartUpdated' => 'checkCartCount'];

    public function checkCartCount(){
        if(Auth::check()){
            return $this->cartCount = Cart::where('user_id', Auth::id())->count();
        }else{
            return $this->cartCount = Cart::where('session_id', Session::id())->count();
        }

    }

    public function render()
    {
        $this->checkCartCount();
        return view('livewire.frontend.cart.cart-count', [
            'cartCount' => $this->cartCount
        ]);
    }
}
