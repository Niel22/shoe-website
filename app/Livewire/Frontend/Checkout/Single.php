<?php

namespace App\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Component;

class Single extends Component
{

    public $cart, $totalProductAmount, $deliveryAddress = [], $cartId;
    public $full_name, $street_address, $town_city, $state, $country, $postcode_zip, $order_id, $phone, $email, $payment_mode, $terms, $payment_id = NULL, $delivery, $shipping_full_name, $shipping_street_address, $shipping_phone, $shipping_email, $shipping_town_city, $shipping_state, $shipping_country, $shipping_postcode_zip, $shipping_address;

    protected $rules = [
        "full_name" => ['required', 'string', 'max:60'],
        "street_address" => ['required', 'string', 'max:200'],
        "town_city" => ['required', 'string', 'max:100'],
        "postcode_zip" => ['required', 'max:6', 'min:6'],
        "phone" => ['required', 'string', 'max:11', 'min:10'],
        "email" => ['required', 'email', 'max:121'],
        "country" => ['required', 'string', 'max:121'],
        "state" => ['required', 'string', 'max:121'],
        "payment_mode" => ['required' ],
        "terms" => ['required' ],
    ];

    public function login($product_id){
        $product = Product::where('id', $product_id)->where('status', 1)->first();
        // dd($product);
        session()->put('checkoutSingle', true);
        session()->put('product_slug', $product->slug);

        return $this->redirect('/login');
    }

    public function placeOrder($validatedOrder)
    {
        $order = Order::create($validatedOrder);

        if ($order) {
            $cart = $this->cart;
                $orderItems = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->products->id,
                    'color' => $cart->color,
                    'size' => $cart->size,
                    'quantity' => $cart->quantity,
                    'price' => $cart->products->selling_price
                ]);


            $this->deliveryAddress['order_id'] = $order->id;
            DeliveryAddress::create($this->deliveryAddress);
            $this->order_id = $order->id;
            return true;
        }

        return false;
    }

    public function cod($validatedOrder){
        $validatedOrder['user_id'] = Auth::id();
        $validatedOrder['tracking_no'] = "shofy". Str::random(5). $validatedOrder['phone'];
        $validatedOrder['reference'] = NULL;
        $validatedOrder['payment_status'] = 'Cash on Delivery';
        $validatedOrder['status_message'] = "In Progress";
        $validatedOrder['payment_mode'] = "Cash On Delivery";
        $validatedOrder['payment_id'] = $this->payment_id;
        $validatedOrder['total_price'] = 0;

        $cart = Cart::where('id', $this->cartId)->first();


        $validatedOrder['total_price'] += $cart->products->selling_price * $cart->quantity;

        $validatedOrder['total_price'] += 3000;

        $CodOrder = $this->placeOrder($validatedOrder);

        if($CodOrder){
            session()->put('order_data', $validatedOrder);
            $cart->delete();


            $this->dispatch('cartUpdated');
            session()->flash('toast-message', 'Order Placed successfully');
            $this->redirect('/thank-you');
            session()->flash('toast-message', 'Order Placed successfully');
        }else{
            session()->flash('toast-error', 'Error emptying cart');
        }

    }

    public function card($validatedOrder){
        $validatedOrder['user_id'] = Auth::id();
        $validatedOrder['tracking_no'] = "shofy". Str::random(5). $validatedOrder['phone'];
        $validatedOrder['reference'] = "BPS". Str::random(10);
        $validatedOrder['payment_status'] = 'pending';
        $validatedOrder['status_message'] = "In Progress";
        $validatedOrder['payment_mode'] = "Card/Bank Transfer";
        $validatedOrder['payment_id'] = $this->payment_id;
        $validatedOrder['total_price'] = 0;


        $cart = Cart::where('id', $this->cartId)->first();


        $validatedOrder['total_price'] += $cart->products->selling_price * $cart->quantity;

        $validatedOrder['total_price'] += 3000;

        // dd($validatedOrder);
        $CardOrder = $this->placeOrder($validatedOrder);

        $validatedOrder['quantity'] = 1;


        $validatedOrder['order_id'] = $this->order_id;

        if ($CardOrder) {
            session()->put('order_data', $validatedOrder);

            $cart->delete();


            session()->flash('toast-message', 'Order Placed successfully, Proceed to make payment.');
            $this->dispatch('cartUpdated');
            return $this->redirect('/payment');
        }
    }

    public function checkout()
    {
        $validatedOrder = $this->validate();

        if (Auth::check()) {

            if ($this->shipping_address) {
                $shipping_address = $this->validate([
                    "shipping_full_name" => ['required', 'string', 'max:60'],
                    "shipping_town_city" => ['required', 'string', 'max:100'],
                    "shipping_state" => ['required', 'string', 'max:121'],
                    "shipping_country" => ['required', 'string', 'max:121'],
                    "shipping_postcode_zip" => ['required', 'max:6', 'min:6'],
                    "shipping_street_address" => ['required', 'string', 'max:200'],
                    "shipping_phone" => ['required', 'string', 'max:11', 'min:10'],
                    "shipping_email" => ['required', 'string', 'max:121']
                ]);

                $this->deliveryAddress = $shipping_address;

            } else {
                $this->deliveryAddress = [
                    'shipping_full_name' => $validatedOrder['full_name'],
                    'shipping_town_city' => $validatedOrder['town_city'],
                    'shipping_state' => $validatedOrder['state'],
                    'shipping_country' => $validatedOrder['country'],
                    'shipping_postcode_zip' => $validatedOrder['postcode_zip'],
                    'shipping_street_address' => $validatedOrder['street_address'],
                    'shipping_phone' => $validatedOrder['phone'],
                    'shipping_email' => $validatedOrder['email'],
                ];
            }

            if ($validatedOrder['payment_mode'] === 'cod') {
                return $this->cod($validatedOrder);
            }

            if($validatedOrder['payment_mode'] === 'card'){
                $this->card($validatedOrder);
            }
        } else {
            session()->flash('toast-error', 'Login to place order');
        }
    }

    public function totalProductAmount(){
        if(Auth::check()){
            $this->full_name = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
        $this->country = "Nigeria";

        if (Auth::check()) {
            $this->cart = Cart::where('id', $this->cartId)->first();
        } else {
            $this->cart = Cart::where('id', $this->cartId)->first();
        }

        $this->totalProductAmount += $this->cart->products->selling_price * $this->cart->quantity;
    }

    public function render()
    {

        // dd($this->cartId);
        if ($this->cartId) {
            if (Auth::check()) {
                $this->full_name = Auth::user()->name;
                $this->email = Auth::user()->email;
            }
            $this->country = "Nigeria";

            if (Auth::check()) {
                $cart = Cart::where('id', $this->cartId)->first();
            } else {
                $cart = Cart::where('id', $this->cartId)->first();
            }

            $this->totalProductAmount();
            // dd($cart);
            return view('livewire.frontend.checkout.single', [
                'cart' => $cart
            ]);
        } else {
            return abort(404);
        }
    }
}
