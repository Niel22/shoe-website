@extends('layouts.app')
@section('pageTitle', 'Wishlists')
@section('content')
<section class="breadcrumb__area include-bg pt-95 pb-50">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12">
             <div class="breadcrumb__content p-relative z-index-1">
                <h3 class="breadcrumb__title">Wishlist</h3>
                <div class="breadcrumb__list">
                   <span><a href="#">Home</a></span>
                   <span>Wishlist</span>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>

 <livewire:frontend.wishlist.index />

@endsection