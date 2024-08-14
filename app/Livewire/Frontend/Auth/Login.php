<?php

namespace App\Livewire\Frontend\Auth;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
    ];

    public function store()
    {

        $user = $this->validate();

        $session_id = Session::get('session_id');

        $checkout = session()->get('checkout') ?? false;
        $product_slug = session()->get('product_slug');


        if (Auth::attempt($user)) {
            session()->regenerate();

            Cart::where('session_id', $session_id)->update([
                'user_id' => Auth::id()
            ]);
            Wishlist::where('session_id', $session_id)->update([
                'user_id' => Auth::id()
            ]);
            session()->flash('toast-message', 'Welcome Back');

            if($checkout){
                return $this->redirect('/checkout');
            }

            if($product_slug){
                return $this->redirectRoute('singleCheckout', ['product_slug' => $product_slug]);
            }

            return $this->redirect('/');
        }

        $this->addError('email', 'Invalid Email Address or Password');
    }

    public function render()
    {

        return view('livewire.frontend.auth.login');
    }
}
