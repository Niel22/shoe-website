@extends('layouts.app')
@section('pageTitle', 'Profile')
@section('content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-90">
       <div class="container">
          <div class="row">
             <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                   <h3 class="breadcrumb__title">Track your order</h3>
                   <div class="breadcrumb__list">
                      <span><a href="{{ url('/') }}">Home</a></span>
                      <span><a href="{{ url('/profile') }}">Profile</a></span>
                      <span>Track your order</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- order area start -->
    <livewire:frontend.profile.track-order :order="$order" />
    <!-- order area end -->

@endsection
