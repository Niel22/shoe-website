@extends('layouts.app')
@section('content')
<main>

    <!-- slider area start -->
    @include('layouts.inc.frontend.home.main-slider')
    <!-- slider area end -->

    <!-- product area start -->
    <livewire:frontend.home.product />
    <!-- product area end -->


    <!-- testimonial area start -->
    {{-- @include('layouts.inc.frontend.home.testimonial') --}}
    <!-- testimonial area end -->

    <!-- blog area start -->
    {{-- @include('layouts.inc.frontend.home.blog') --}}
    <!-- blog area end -->

    <!-- feature area start -->
    @include('layouts.inc.frontend.home.feature-area')
    <!-- feature area end -->

    <!-- instagram area start -->
    {{-- @include('layouts.inc.frontend.home.instagram') --}}
    <!-- instagram area end -->


 </main>
@endsection
