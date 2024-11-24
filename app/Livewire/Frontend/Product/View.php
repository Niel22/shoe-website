<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Color;
use App\Models\ProductSize;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class View extends Component
{

    public $product, $quantityCount = 1, $selectedColor, $selectedSize;

    public function selectColor($color)
    {
        $this->selectedColor = $color['name'];
    }

    public function selectSize($size)
    {
        $this->selectedSize =  $size;
    }

    public function buyNow($product_id){
        if (Auth::check()) {
            if ($this->product->where('id', $product_id)->where('status', 1)->exists()) {

                if ($this->product->quantity > 0) {

                    if ($this->product->quantity >= $this->quantityCount) {

                        if ($this->selectedSize != NULL) {

                            if ($this->selectedColor != NULL) {


                                if (Cart::where('user_id', Auth::id())->where('product_id', $product_id)->where('color', $this->selectedColor)->where('size', $this->selectedSize)->exists()) {
                                    $product = $this->product->where('id', $product_id)->where('status', 1)->first();
                                    return $this->redirectRoute('singleCheckout', ['product_slug' => $product->slug]);
                                } else {
                                    $cart = Cart::create([
                                        'session_id' => Session::id(),
                                        'user_id' => Auth::id(),
                                        'product_id' => $product_id,
                                        'color' => $this->selectedColor,
                                        'size' => $this->selectedSize,
                                        'quantity' => $this->quantityCount
                                    ]);

                                    $product = $this->product->where('id', $product_id)->where('status', 1)->first();

                                    session()->put($product->name.'cart', $cart->id);

                                    return $this->redirectRoute('singleCheckout', ['product_slug' => $product->slug]);
                                }
                            }else{
                            session()->flash('toast-error', 'Select shoe color you want');
                            return false;
                            }

                        }else{
                        session()->flash('toast-error', 'Select Shoe size you want');
                        return false;
                        }
                    }else{

                    session()->flash('toast-error', 'Only ' . $this->product->quantity . ' Quantity Available');
                    return false;
                    }
                }else{

                session()->flash('toast-error', 'Out of stock');
                return false;
                }
            }else{
                return abort(404);
            }
        } else {
            if ($this->product->where('id', $product_id)->where('status', 1)->exists()) {

                if ($this->product->quantity > 0) {

                    if ($this->product->quantity >= $this->quantityCount) {

                        if ($this->selectedSize != NULL) {

                            if ($this->selectedColor != NULL) {

                                if (Cart::where('session_id', Session::id())->where('product_id', $product_id)->where('color', $this->selectedColor)->where('size', $this->selectedSize)->exists()) {
                                    $product = $this->product->where('id', $product_id)->where('status', 1)->first();
                                    return $this->redirectRoute('singleCheckout', ['product_slug' => $product->slug]);
                                } else {
                                    $cart = Cart::create([
                                        'session_id' => Session::id(),
                                        'user_id' =>  0,
                                        'product_id' => $product_id,
                                        'color' => $this->selectedColor,
                                        'size' => $this->selectedSize,
                                        'quantity' => $this->quantityCount
                                    ]);

                                    session()->put('session_id', Session::id());

                                    $product = $this->product->where('id', $product_id)->where('status', 1)->first();

                                    session()->put($product->name.'cart', $cart->id);

                                    return $this->redirectRoute('singleCheckout', ['product_slug' => $product->slug]);
                                }
                            }
                            session()->flash('toast-error', 'Select shoe color you want');
                            return false;
                        }
                        session()->flash('toast-error', 'Select Shoe size you want');
                        return false;
                    }

                    session()->flash('toast-error', 'Only ' . $this->product->quantity . ' Quantity Available');
                    return false;
                }

                session()->flash('toast-error', 'Out of stock');
                return false;
            }
        }
    }

    public function addToWishlist($product_id)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->exists()) {
                session()->flash('toast-message', 'Product already added to wishlist');
            } else {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'session_id' => Session::id(),
                    'product_id' => $product_id
                ]);

                $this->dispatch('wishlistUpdated');

                session()->flash('toast-message', 'Added product to wishlist');
            }
        } else {
            if (Wishlist::where('session_id', Session::id())->where('product_id', $product_id)->exists()) {
                session()->flash('toast-message', 'Product already added to wishlist');
            } else {
                Wishlist::create([
                    'user_id' => 0,
                    'session_id' => Session::id(),
                    'product_id' => $product_id
                ]);

                $this->dispatch('wishlistUpdated');

                session()->flash('toast-message', 'Added product to wishlist');
            }
        }
    }

    public function addToCart($product_id)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $product_id)->where('status', 1)->exists()) {

                if ($this->product->quantity > 0) {

                    if ($this->product->quantity >= $this->quantityCount) {

                        if ($this->selectedSize != NULL) {

                            if ($this->selectedColor != NULL) {

                                if (Cart::where('user_id', Auth::id())->where('product_id', $product_id)->where('color', $this->selectedColor)->where('size', $this->selectedSize)->exists()) {
                                    session()->flash('toast-message', 'Shoe Already Added to cart');
                                } else {
                                    Cart::create([
                                        'session_id' => Session::id(),
                                        'user_id' => Auth::id(),
                                        'product_id' => $product_id,
                                        'color' => $this->selectedColor,
                                        'size' => $this->selectedSize,
                                        'quantity' => $this->quantityCount
                                    ]);

                                    $this->dispatch('cartUpdated');

                                    session()->flash('toast-message', 'Shoe Added to cart');
                                }
                            }else{
                            session()->flash('toast-error', 'Select shoe color you want');
                            return false;
                            }

                        }else{
                        session()->flash('toast-error', 'Select Shoe size you want');
                        return false;
                        }
                    }else{

                    session()->flash('toast-error', 'Only ' . $this->product->quantity . ' Quantity Available');
                    return false;
                    }
                }else{

                session()->flash('toast-error', 'Out of stock');
                return false;
                }
            }else{
                return abort(404);
            }
        } else {
            if ($this->product->where('id', $product_id)->where('status', 1)->exists()) {

                if ($this->product->quantity > 0) {

                    if ($this->product->quantity >= $this->quantityCount) {

                        if ($this->selectedSize != NULL) {

                            if ($this->selectedColor != NULL) {

                                if (Cart::where('session_id', Session::id())->where('product_id', $product_id)->where('color', $this->selectedColor)->where('size', $this->selectedSize)->exists()) {
                                    session()->flash('toast-message', 'Shoe Already Added to cart');
                                } else {
                                    Cart::create([
                                        'session_id' => Session::id(),
                                        'user_id' =>  0,
                                        'product_id' => $product_id,
                                        'color' => $this->selectedColor,
                                        'size' => $this->selectedSize,
                                        'quantity' => $this->quantityCount
                                    ]);

                                    session()->put('session_id', Session::id());

                                    $this->dispatch('cartUpdated');

                                    session()->flash('toast-message', 'Shoe Added to cart');
                                }
                            }
                            session()->flash('toast-error', 'Select shoe color you want');
                            return false;
                        }
                        session()->flash('toast-error', 'Select Shoe size you want');
                        return false;
                    }

                    session()->flash('toast-error', 'Only ' . $this->product->quantity . ' Quantity Available');
                    return false;
                }

                session()->flash('toast-error', 'Out of stock');
                return false;
            }
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function increaseQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function checkCart($product_id){
        if(Auth::check()){
        return Cart::where('user_id', Auth::id())->where('product_id', $product_id)->where('color', $this->selectedColor)->where('size', $this->selectedSize)->exists();
        }else{
            return Cart::where('session_id', Session::id())->where('product_id', $product_id)->where('color', $this->selectedColor)->where('size', $this->selectedSize)->exists();
        }

    }

    public function checkWishlist($product_id){
        if(Auth::check()){
       return Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->exists();
        }else{
            return Wishlist::where('session_id', Session::id())->where('product_id', $product_id)->exists();
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.view');
    }
}
