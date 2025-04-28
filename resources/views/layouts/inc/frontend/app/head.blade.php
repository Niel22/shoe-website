<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @if(Route::is('home'))
        <title>WomarkBuy | Your Trusted Online Shoe Marketplace</title>
        <meta name="description" content="Explore WomarkBuy, your go-to online store for premium casual shoes, formal footwear, sports shoes, boots, and more. Discover unbeatable prices and top-quality footwear.">
        <meta name="keywords" content="shoes, casual shoes, formal shoes, sports shoes, boots, sneakers, leather shoes, men's shoes, women's shoes, online shoe store, affordable shoes, premium footwear, stylish shoes, WomarkBuy">
        <meta name="og:title" content="WomarkBuy | Your Trusted Online Shoe Marketplace">
    @else
        <title>@yield('pageTitle', 'WomarkBuy - Premium Shoe Collection')</title>
        <meta name="description" content="@yield('meta_description', 'Shop for stylish and comfortable shoes at WomarkBuy. We offer a wide variety of casual, formal, and sports footwear for everyone.')">
        <meta name="keywords" content="@yield('meta_keyword', 'shoes, casual shoes, formal shoes, sports shoes, boots, sneakers, leather shoes, men\'s shoes, women\'s shoes, online shoe store, premium footwear, WomarkBuy')">
        <meta name="og:title" content="@yield('pageTitle', 'WomarkBuy - Premium Shoe Collection')">
    @endif

    <meta name="author" content="NIEL">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#ffffff">

    <meta name="og:description" content="Shop for stylish and comfortable shoes at WomarkBuy. We offer a wide variety of casual, formal, and sports footwear for everyone.">
    <meta name="og:image" content="{{ asset('path-to-your-image.jpg') }}">
    <meta name="og:url" content="{{ url()->current() }}">
    <meta name="og:type" content="website">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/logo/favicon.png') }}">

    <!-- CSS here -->
    @include('assets.frontend.css.style')
    @livewireStyles
</head>

