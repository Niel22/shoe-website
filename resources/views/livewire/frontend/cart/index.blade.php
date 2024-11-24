<section class="tp-cart-area pb-120">
    @include('layouts.inc.frontend.app.flash-message')
    @php
        $totalPrice = 0;
    @endphp
    <div class="container">
        <div class="row">
           @if($carts->count() > 0)
          <div class="col-xl-12 col-lg-12">
             <div class="tp-cart-list mb-25 mr-30">
                <table class="table">
                   <thead>
                     <tr>
                       <th class="tp-cart-header-product">Product</th>
                       <th class="tp-cart-header-product">Name</th>
                       <th class="tp-cart-header-price">Price</th>
                       <th class="tp-cart-header-color">Color</th>
                       <th class="tp-cart-header-size">Size</th>
                       <th class="tp-cart-header-quantity">Quantity</th>
                       <th class="tp-cart-header-price">Total</th>
                       <th></th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($carts as $cart)
                      <tr class="text-nowrap">
                         <!-- img -->
                         <td class="tp-cart-img"><a href="{{ url('/collection/'.$cart->products->slug) }}"> <img src="{{ asset('storage/uploads/products/'.$cart->products->productImages[0]->image) }}" alt="{{ $cart->products->name }}"></a></td>
                         <!-- title -->
                         <td class="tp-cart-title p-2"><a href="{{ url('/collection/'.$cart->products->slug) }}">{{ $cart->products->name }}</a></td>
                         <!-- price -->
                         <td class="tp-cart-price p-2"><span>₦{{ number_format($cart->products->selling_price, 2) }}</span></td>

                         <td class="tp-cart-price p-2"><span>{{ $cart->color }}</span></td>
                         <td class="tp-cart-price p-2"><span>{{ $cart->size }}</span></td>
                         <!-- quantity -->
                         <td class="tp-cart-quantity p-2">
                            <div class="tp-product-quantity mt-10 mb-10">
                               <span wire:click="decreaseQuantity({{ $cart->id }})" class="tp-cart-minus">
                                   <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                  </svg>
                               </span>
                               <input  class="tp-cart-input" type="text" value="{{ $cart->quantity }}">
                               <span wire:click="increaseQuantity({{ $cart->id }})" class="tp-cart-plus">
                                  <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                     <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </td>
                        <td class="tp-cart-price p-2"><span>₦{{ number_format($cart->products->selling_price * $cart->quantity, 2) }}</span></td>
                         <!-- action -->
                         <td class="tp-cart-action p-2">
                            <button wire:loading.remove wire:target="delete({{ $cart->id }})" wire:click="delete({{ $cart->id }})" class="tp-cart-action-btn">
                               <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"></path>
                               </svg>
                               <span >Remove</span>
                            </button>
                            <span wire:loading wire:target="delete({{ $cart->id }})">
                             <div class="spinner-border" role="status">
                                 <span class="visually-hidden">Loading...</span>
                             </div>
                            </span>
                         </td>
                      </tr>
                      @php
                          $totalPrice += $cart->products->selling_price * $cart->quantity;
                      @endphp
                      @endforeach
                   </tbody>
                 </table>
             </div>
                </div>
             </div>
             <div class="col-xl-3 col-lg-4 col-md-6 mt-4">
                <div class="tp-cart-checkout-wrapper">
                   <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                      <span class="tp-cart-checkout-top-title">Subtotal</span>
                      <span class="tp-cart-checkout-top-price">₦{{ number_format($totalPrice, 2) }}</span>
                   </div>
                   <div class="tp-cart-checkout-proceed">
                      <a href="{{ url('/checkout') }}" class="tp-cart-checkout-btn w-100">Proceed to Checkout</a>
                   </div>
                </div>
             </div>
          </div>
          @endif
          @if($carts->count() === 0)
               <div class="cartmini__empty text-center ">
                   <img src="{{ asset('frontend/img/product/cartmini/empty-cart.png') }}" alt="empty cart">
                   <p>Your Cart is empty</p>
                   <a href="{{ url('/collection') }}" class="tp-btn">Go to Shop</a>
               </div>
           @endif
       </div>

    </div>
 </section>
