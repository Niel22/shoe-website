<?php

namespace App\Livewire\Frontend\Auth;

use App\Models\Cart;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Auth\Events\Registered;

class Register extends Component
{

    public $name, $email, $password, $terms;

    protected $rules = [
        'name' => ['required', 'string', 'min:8'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:8'],
        'terms' => ['required'],
    ];

    public function create()
    {
        $user = $this->validate();

        $session_id = Session::get('session_id');

        $checkout = session()->get('checkout') ?? false;
        $product_slug = session()->get('product_slug');


        $authUser = User::create($user);

        Auth::login($authUser);

        Cart::where('session_id', $session_id)->update([
            'user_id' => Auth::id()
        ]);
        Wishlist::where('session_id', $session_id)->update([
            'user_id' => Auth::id()
        ]);
        session()->flash('toast-success', 'Registered and Signed In Successfully');

        if($checkout){
            return $this->redirect('/checkout');
        }

        if($product_slug){
            return $this->redirectRoute('singleCheckout', ['product_slug' => $product_slug]);
        }

        event(new Registered($user));

        session()->flash('toast-success', 'Registered and Signed In Successfully');

        return $this->redirect('/');

    }

    public function render()
    {
        return view('livewire.frontend.auth.register');
    }
}
