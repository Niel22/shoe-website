@extends('layouts.app')
@section('pageTitle', 'Checkout')
@section('content')
<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5" style="background-color: rgb(239, 241, 245);">
       <div class="container">
          <div class="row">
             <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                   <h3 class="breadcrumb__title">Checkout</h3>
                   <div class="breadcrumb__list">
                      <span><a href="#">Home</a></span>
                      <span>Checkout</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- checkout area start -->
    <livewire:frontend.checkout.index />
    <!-- checkout area end -->


 </main>
@endsection
