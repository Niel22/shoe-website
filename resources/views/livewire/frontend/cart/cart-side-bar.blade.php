<div wire:ignore.self class="cartmini__area cartmini__style-darkRed">
    @php
        $totalPrice = 0;
    @endphp
    <div class="cartmini__wrapper d-flex justify-content-between flex-column">
        <div class="cartmini__top-wrapper">
            <div class="cartmini__top p-relative">
                <div class="cartmini__top-title">
                    <h4>Shopping cart</h4>
                </div>
                <div class="cartmini__close">
                    <button type="button" class="cartmini__close-btn cartmini-close-btn"><i class="fal fa-times"></i></button>
                </div>
            </div>
            @if($carts->count() > 0)
            <div class="cartmini__widget">
                @foreach($carts as $cart)
                <div class="cartmini__widget-item">
                    <div class="cartmini__thumb">
                      <a href="product-details.html">
                         <img src="{{ asset('storage/uploads/products/'.$cart->products->productImages[0]->image) }}" alt="{{ $cart->products->name }}">
                      </a>
                    </div>
                    <div class="cartmini__content">
                      <h5 class="cartmini__title"><a href="{{ url('/collection/'. $cart->products->category->slug . '/' . $cart->products->slug) }}">{{ $cart->products->name }}</a></h5>
                      <div class="cartmini__price-wrapper">
                         <span class="cartmini__price">₦{{ number_format($cart->products->selling_price, 2) }}</span>
                         <span class="cartmini__quantity">x{{ $cart->quantity }}</span>
                      </div>
                    </div>
                    <button wire:click="delete({{ $cart->id }})" class="cartmini__del">
                        <i wire:loading.remove wire:target="delete({{ $cart->id }})" class="fa-regular fa-xmark"></i>
                        <div wire:loading wire:target="delete({{ $cart->id }})" class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
                @php
                          $totalPrice += $cart->products->selling_price * $cart->quantity;
                @endphp
                @endforeach
            </div>
            @endif
            <!-- for wp -->
            <!-- if no item in cart -->
            @if($carts->count() === 0)
            <div class="cartmini__empty text-center ">
                <img src="{{ asset('frontend/img/product/cartmini/empty-cart.png') }}" alt="empty cart">
                <p>Your Cart is empty</p>
                <a href="{{ url('/collection') }}" class="tp-btn">Go to Shop</a>
            </div>
            @endif
        </div>
        @if($carts->count() > 0)
        <div class="cartmini__checkout">
            <div class="cartmini__checkout-title mb-30">
                <h4>Subtotal:</h4>
                <span>₦{{ number_format($totalPrice, 2) }}</span>
            </div>
            <div class="cartmini__checkout-btn">
                <a href="{{ url('/cart') }}" class="tp-btn mb-10 w-100"> view cart</a>
                <a href="{{ url('/checkout') }}" class="tp-btn tp-btn-border w-100"> checkout</a>
            </div>
        </div>
        @endif
    </div>
</div>
