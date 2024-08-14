@extends('layouts.app')
@section('pageTitle', 'Verify Email')
@section('content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
       <div class="container">
          <div class="row">
             <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                   <h3 class="breadcrumb__title">Email Verification</h3>
                   <div class="breadcrumb__list">
                      <span><a href="{{ url('/') }}">Home</a></span>
                      <span>Verify Email</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- login area start -->
    <livewire:frontend.auth.verify-email />
    <!-- login area end -->
@endsection
