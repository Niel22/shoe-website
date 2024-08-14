@extends('layouts.app')
@section('pageTitle', 'Page Not Found')
@section('content')
<section class="tp-error-area pt-110 pb-110">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8 col-md-10">
             <div class="tp-error-content text-center">
                <div class="tp-error-thumb">
                   <img src="{{ asset('frontend/img/error/error.png') }}" alt="">
                </div>

                <h3 class="tp-error-title">Oops! Page not found</h3>
                <p>Whoops, this is embarassing. Looks like the page you were looking for wasn't found.</p>

                <a href="{{ url('/') }}" class="tp-error-btn">Back to Home</a>
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection
