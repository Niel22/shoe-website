@extends('layouts.app')
@section('pageTitle', 'Cart')
@section('content')
   <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
       <div class="container">
          <div class="row">
             <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                   <h3 class="breadcrumb__title">Shopping Cart</h3>
                   <div class="breadcrumb__list">
                      <span><a href="#">Home</a></span>
                      <span>Shopping Cart</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- cart area start -->
    <livewire:frontend.cart.index />
    <!-- cart area end -->
@endsection
