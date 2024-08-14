<section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5" style="background-color: rgb(239, 241, 245);">
    @include('layouts.inc.frontend.app.flash-message')
    @if(!$cart)
    <div class=" text-center ">
        <img src="{{ asset('frontend/img/product/cartmini/empty-cart.png') }}" alt="empty cart">
        <p>You cart is empty to checkout</p>
        <a href="{{ url('/collection') }}" class="tp-btn">Go to Shop</a>
    </div>
    @else
    <div class="container">
        <div class="row">
            @guest
                <div class="col-xl-7 col-lg-7">
                    <div class="tp-checkout-verify">
                        <div class="tp-checkout-verify-item">
                            <p class="tp-checkout-verify-reveal">Returning customer?
                                <button type="button" wire:click="login({{ $cart->products->id }})"
                                    class="tp-checkout-login-form-reveal-btn">Click here to login</button></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="tp-checkout-verify">
                        <div class="tp-checkout-verify-item">
                            <p class="tp-checkout-verify-reveal">New customer?
                                <button type="button" wire:click="login"
                                    class="tp-checkout-login-form-reveal-btn">Click here to Register</button></p>
                        </div>
                    </div>
                </div>
            @endguest
            <div class="col-lg-7">
                <div class="tp-checkout-bill-area">
                    <h3 class="tp-checkout-bill-title">Billing Details</h3>

                    <div class="tp-checkout-bill-form">
                        <form wire:submit="checkout">
                            <div class="tp-checkout-bill-inner">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Full Name <span>*</span></label>
                                            <input type="text" placeholder="Full Name" wire:model="full_name">
                                            @error('full_name')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Phone <span>*</span></label>
                                            <input type="tel" placeholder="" wire:model="phone">
                                            @error('phone')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Email address <span>*</span></label>
                                            <input type="email" placeholder="" wire:model="email">
                                            @error('email')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Street address</label>
                                            <input type="text" placeholder="House number and street name"
                                                wire:model="street_address">
                                            @error('street_address')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Town / City</label>
                                            <input type="text" placeholder="" wire:model="town_city">
                                            @error('town_city')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="tp-checkout-input">
                                            <label>State</label>
                                            <input type="text" placeholder="" wire:model="state">
                                            @error('state')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="tp-checkout-input">
                                            <label>Country</label>
                                            <input type="text" placeholder="" wire:model="country">
                                            @error('country')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="tp-checkout-input">
                                            <label>Postcode ZIP</label>
                                            <input type="number" placeholder="" wire:model="postcode_zip">
                                            @error('postcode_zip')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="tp-checkout-verify-item">
                                        <p class="tp-checkout-verify-reveal"> <input type="checkbox" wire:model="shipping_address" id="shipping_address" class="tp-checkout-login-form-reveal-btn"><label class="tp-checkout-login-form-reveal-btn" for="">Ship to a different address</label></p>

                                        <div id="tpReturnCustomerLoginForm" class="tp-return-customer" style="display: none;">
                                            <h3 class="tp-checkout-bill-title">Shipping Details</h3>
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Country</label>
                                                    <input type="text" placeholder="Nigeria" wire:model="shipping_country">
                                                    @error('shipping_country')
                                                        <span class="text-sm text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>Full Name <span>*</span></label>
                                                    <input type="text" placeholder="Full Name" wire:model="shipping_full_name">
                                                    @error('shipping_full_name')
                                                        <span class="text-sm text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>Email address <span>*</span></label>
                                                    <input type="email" placeholder="" wire:model="shipping_email">
                                                    @error('shipping_email')
                                                        <span class="text-sm text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>Phone <span>*</span></label>
                                                    <input type="text" placeholder="" wire:model="shipping_phone">
                                                    @error('shipping_phone')
                                                        <span class="text-sm text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tp-checkout-input">
                                                    <label>Street address</label>
                                                    <input type="text" placeholder="House number and street name"
                                                        wire:model="shipping_street_address">
                                                    @error('shipping_street_address')
                                                        <span class="text-sm text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tp-checkout-input">
                                                    <label>Town / City</label>
                                                    <input type="text" placeholder="" wire:model="shipping_town_city">
                                                    @error('shipping_town_city')
                                                        <span class="text-sm text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tp-checkout-input">
                                                    <label>State</label>
                                                    <input type="text" placeholder="" wire:model="shipping_state">
                                                    @error('shipping_state')
                                                        <span class="text-sm text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="tp-checkout-input">
                                                    <label>Postcode ZIP</label>
                                                    <input type="text" placeholder="" wire:model="shipping_postcode_zip">
                                                    @error('shipping_postcode_zip')
                                                        <span class="text-sm text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <!-- checkout place order -->
                <div class="tp-checkout-place white-bg">
                    <h3 class="tp-checkout-place-title">Your Order</h3>

                    <div class="tp-order-info-list">
                        <ul>

                            <!-- header -->
                            <li class="tp-order-info-list-header">
                                <h4>Product</h4>
                                <h4>Total</h4>
                            </li>

                            <!-- item list -->
                            <li class="tp-order-info-list-desc">
                                <p>{{ $cart->products->name }}, Color {{ $cart->color }}, Size {{ $cart->size }} <span> x {{ $cart->quantity }}</span></p>
                                <span>₦{{ number_format($cart->products->selling_price, 2) }}</span>
                            </li>

                            <!-- subtotal -->
                            <li class="tp-order-info-list-subtotal">
                                <span>Subtotal</span>
                                <span>₦{{ number_format($totalProductAmount, 2) }}</span>
                            </li>

                            <!-- shipping -->
                            <li class="tp-order-info-list-shipping">
                                <span>Shipping Fee</span>
                                <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                    <span> ₦{{ number_format(3000, 2) }}<span>
                                    </span>
                                </div>
                            </li>

                            <!-- total -->
                            <li class="tp-order-info-list-total">
                                <span>Total</span>
                                <span>₦{{ number_format($totalProductAmount + 3000, 2) }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="tp-checkout-payment">
                        <div class="tp-checkout-payment-item">
                            <input type="radio" wire:model="payment_mode" value="card" id="cheque_payment"
                                name="payment">
                            <label for="cheque_payment">Card/Bank Transfer</label>
                            <div class="tp-checkout-payment-desc cheque-payment">
                                <p>Make your payment directly into our bank account. Please use your Order ID as the
                                    payment reference. Your order will not be shipped until the funds have cleared in
                                    our account.</p>
                            </div>
                        </div>
                        <div class="tp-checkout-payment-item">
                            <input type="radio" wire:model="payment_mode" value="cod" id="cod"
                                name="payment">
                            <label for="cod">Cash on Delivery</label>
                            <div class="tp-checkout-payment-desc cash-on-delivery">
                                <p>Shoe will be delivered within 3-5 working days.</p>
                            </div>
                        </div>
                        @error('payment_mode')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="tp-checkout-agree">
                        <div class="tp-checkout-option">
                            <input wire:model="terms" id="read_all" type="checkbox">
                            <label for="read_all">I have read and agree to the website.</label>
                        </div>
                        @error('terms')
                            <span class="text-sm text-danger">Confirm that you have agreed to the website.</span>
                        @enderror
                    </div>
                    <div class="tp-checkout-btn-wrapper">
                        <button wire:loading.remove wire:target="checkout" type="submit" class="tp-checkout-btn w-100">Place Order</button>
                        <button wire:loading wire:target="checkout" type="submit" class="tp-checkout-btn w-100">Processing Order...</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</section>
