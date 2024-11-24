@extends('layouts.app')
@section('pageTitle', 'Thank you for shopping')
@section('content')
    <section class="tp-error-area pt-110 pb-110">
        @include('layouts.inc.frontend.app.flash-message')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="tp-error-content text-center">
                        <div class="tp-error-thumb">
                            <img src="{{ asset('/frontend/img/product/shop/thankyou.png') }}" width="50%" alt="Thank you">
                        </div>

                        <h4 class="tp-error-title">Success</h4>
                        @if ($paid)
                            <p>Your payment of ₦{{ number_format($order['total_price'], 2) }} was successful and your order has been placed.</p>
                        @else
                            <p>Your Order of ₦{{ number_format($order['total_price'], 2) }} has been placed.</p>
                        @endif

                        <a href="{{ url('/track-order/'.$trackingNo) }}" class="tp-btn">Track Your Order</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
