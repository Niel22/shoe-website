<!doctype html>
<html class="no-js" lang="zxx">


@include('layouts.inc.frontend.app.head')


<body>

    @include('layouts.inc.frontend.app.flash-message')
    <!-- pre loader area start -->
    @include('layouts.inc.frontend.app.preloader')
     <!-- pre loader area end -->

     <!-- back to top start -->
     @include('layouts.inc.frontend.app.back-to-top-start')
     <!-- back to top end -->

     <!-- offcanvas area start -->
     <div class="offcanvas__area offcanvas__style-primary">
        <div class="offcanvas__wrapper">
           <div class="offcanvas__close">
              <button class="offcanvas__close-btn offcanvas-close-btn">
                 <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
           </div>
           <div class="offcanvas__content">
              <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                 <div class="offcanvas__logo logo">
                    <a href="index.html">
                       <img src="{{ asset('frontend/img/logo/logo.svg') }}" alt="logo">
                    </a>
                 </div>
              </div>
              <div class="tp-main-menu-mobile fix mb-40"></div>

              <div class="offcanvas__contact align-items-center d-none">
                 <div class="offcanvas__contact-icon mr-20">
                    <span>
                       <img src="{{ asset('frontend/img/icon/contact.png') }}" alt="">
                    </span>
                 </div>
                 <div class="offcanvas__contact-content">
                    <h3 class="offcanvas__contact-title">
                       <a href="tel:098-852-987">004524865</a>
                    </h3>
                 </div>
              </div>
              <div class="offcanvas__btn">
                 <a href="contact.html" class="tp-btn-2 tp-btn-border-2">Contact Us</a>
              </div>
           </div>
           <div class="offcanvas__bottom">
              <div class="offcanvas__footer d-flex align-items-center justify-content-between">
                 <div class="offcanvas__currency-wrapper currency">
                    <span class="offcanvas__currency-selected-currency tp-currency-toggle" id="tp-offcanvas-currency-toggle">Currency : USD</span>
                    <ul class="offcanvas__currency-list tp-currency-list">
                       <li>USD</li>
                       <li>ERU</li>
                       <li>BDT </li>
                       <li>INR</li>
                    </ul>
                 </div>
                 <div class="offcanvas__select language">
                    <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                       <div class="offcanvas__lang-img mr-15">
                          <img src="{{ asset('frontend/img/icon/language-flag.png') }}" alt="">
                       </div>
                       <div class="offcanvas__lang-wrapper">
                          <span class="offcanvas__lang-selected-lang tp-lang-toggle" id="tp-offcanvas-lang-toggle">English</span>
                          <ul class="offcanvas__lang-list tp-lang-list">
                             <li>Spanish</li>
                             <li>Portugese</li>
                             <li>American</li>
                             <li>Canada</li>
                          </ul>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="body-overlay"></div>
     <!-- offcanvas area end -->

     <!-- mobile menu area start -->
     <div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
        <div class="container">
           <div class="row row-cols--@auth 5 @else 4 @endauth">
              <div class="col">
                 <div class="tp-mobile-item text-center">
                    <a href="{{ url('/collection') }}" class="tp-mobile-item-btn">
                       <i class="flaticon-store"></i>
                       <span>Shop</span>
                    </a>
                 </div>
              </div>
              <div class="col">
                 <div class="tp-mobile-item text-center">
                    <button class="tp-mobile-item-btn tp-search-open-btn">
                       <i class="flaticon-search-1"></i>
                       <span>Search</span>
                    </button>
                 </div>
              </div>
              @auth
              <div class="col">
                 <div class="tp-mobile-item text-center">
                    <a href="{{ url('/wishlist') }}" class="tp-mobile-item-btn">
                       <i class="flaticon-love"></i>
                       <span>Wishlist</span>
                    </a>
                 </div>
              </div>
              @endauth
              @auth
              <div class="col">
                 <div class="tp-mobile-item text-center">
                    <a href="{{ url('/profile') }}" class="tp-mobile-item-btn">
                       <i class="flaticon-user"></i>
                       <span>Account</span>
                    </a>
                 </div>
              </div>
              @endauth
              @guest
              <div class="col">
                 <div class="tp-mobile-item text-center">
                    <a href="{{ url('/login') }}" class="tp-mobile-item-btn">
                       <i class="flaticon-user"></i>
                       <span>Account</span>
                    </a>
                 </div>
              </div>
              @endguest
              <div class="col">
                 <div class="tp-mobile-item text-center">
                    <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                       <i class="flaticon-menu-1"></i>
                       <span>Menu</span>
                    </button>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- mobile menu area end -->


     <!-- search area start -->
     <section class="tp-search-area tp-search-style-secondary">
        <div class="container">
           <div class="row">
              <div class="col-xl-12">
                 <div class="tp-search-form">
                    <div class="tp-search-close text-center mb-20">
                       <button class="tp-search-close-btn tp-search-close-btn"></button>
                    </div>
                    <form action="#">
                       <div class="tp-search-input mb-10">
                          <input type="text" placeholder="Search for product...">
                          <button type="submit"><i class="flaticon-search-1"></i></button>
                       </div>
                       <div class="tp-search-category">
                          <span>Search by : </span>
                          <a href="#">Men, </a>
                          <a href="#">Women, </a>
                          <a href="#">Children, </a>
                          <a href="#">Shirt, </a>
                          <a href="#">Demin</a>
                       </div>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- search area end -->

     <!-- cart mini area start -->
     @include('layouts.inc.frontend.app.cart')

    <!-- header area start -->
    @include('layouts.inc.frontend.app.header')
     <!-- header area end -->

     <main>
        @yield('content')
     </main>

     <!-- footer area start -->
     @include('layouts.inc.frontend.app.footer')
     <!-- footer area end -->


    <!-- JS here -->
    @include('assets.frontend.js.script')

    </body>


</html>
