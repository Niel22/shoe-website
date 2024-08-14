<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @if(Route::is('home'))
    <title>Berry Shoes</title>
    @else
    <title>@yield('pageTitle') || Berry Shoes</title>
    @endif
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="NIEL">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/logo/favicon.png') }}">

    <!-- CSS here -->
    @include('assets.frontend.css.style')
    @livewireStyles
</head>
