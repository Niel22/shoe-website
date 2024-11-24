<?php

namespace App\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class WishlistCount extends Component
{
    public $wishlistCount;

    protected $listeners = ['wishlistUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount(){
        if(Auth::check()){
            return $this->wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        }else{
            return $this->wishlistCount = Wishlist::where('session_id', Session::id())->count();
        }
    }
    public function render()
    {
        $this->checkWishlistCount();
        return view('livewire.frontend.wishlist.wishlist-count', [
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}
