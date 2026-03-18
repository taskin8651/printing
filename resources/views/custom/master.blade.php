@php 
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Setting;

$categories = Category::with(['subcategories.products'])->get();
$settings = Setting::first();
@endphp

<!DOCTYPE html>
<html lang="en">
    <!--<< Header Area >>-->
    
<!-- Mirrored from modinatheme.com/html/printnow-html/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Mar 2026 14:00:37 GMT -->
<head>
        <!-- ========== Meta Tags ========== -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="modinatheme">
        <meta name="description" content="Printnow - Printing Company & Design Services HTML Template">
        <!-- ======== Page title ============ -->
        <title>Printnow - Printing Company & Design Services HTML Template</title>
        <!--<< Favcion >>-->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.svg') }}">
        <!--<< Bootstrap min.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!--<< Font Awesome.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
        <!--<< Animate.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <!--<< Magnific Popup.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <!--<< MeanMenu.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
        <!--<< Swiper Slider.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
        <!--<< Nice Select.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
        <!--<< Main.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <!--<< Style.css >>-->
        <link rel="stylesheet" href="{{ asset('style.css') }}">
    </head>

    <body>

    <!-- Preloader Start -->
    <!-- <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">                
            </div>
            <div class="txt-loading">
                <span data-text-preloader="P" class="letters-loading">
                    P
                </span>
                <span data-text-preloader="R" class="letters-loading">
                    R
                </span>
                <span data-text-preloader="I" class="letters-loading">
                    I
                </span>
                <span data-text-preloader="N" class="letters-loading">
                    N
                </span>
                <span data-text-preloader="T" class="letters-loading">
                    T
                </span>
                <span data-text-preloader="N" class="letters-loading">
                    N
                </span>
                <span data-text-preloader="0" class="letters-loading">
                    O
                </span>
                <span data-text-preloader="W" class="letters-loading">
                    W
                </span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div> -->

    <!--<< Mouse Cursor Start >>-->  
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- Back To Top Start -->
    <div class="scroll-up">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- Offcanvas Area Start -->
    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="/">
                                <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="logo-img"><img src="{{ $settings->getFirstMediaUrl('logo') ?: asset('assets/img/logo/logo.svg') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-xl-block">
                        {{ $settings->getFirstMediaUrl('contact_info') ?: 'Default contact info' }}
                    </p>
                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">
                        <h4>Contact Info</h4>
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="{{ $settings->getFirstMediaUrl('contact_address') ?: '#' }}">
                                        {{ $settings->getFirstMediaUrl('contact_address') ?: 'Default contact address' }}
                                    </a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                     <a href="https://modinatheme.com/cdn-cgi/l/email-protection#81e8efe7eec1e4f9e0ecf1ede4afe2eeec"><span class="mailto:info@azent.com"><span class="__cf_email__" data-cfemail="1970777f76597c61787469757c377a7674">[email&#160;protected]</span></span></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">Mod-friday, 09am -05pm</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+11002345909">+11002345909</a>
                                </div>
                            </li>
                        </ul>
                        <div class="header-button mt-4">
                            <a href="shop-details.html" class="theme-btn">Shop Now <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="social-icon d-flex align-items-center">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>
<!-- Header Top Section Start -->
    <div class="header-top-section py-1">
        <div class="container-fluid">
            <div class="header-top-wrapper">
                <ul class="contact-list">
                    <li>
                        <i class="far fa-envelope"></i>
                        <a href="{{ $settings->email }}">{{$settings->email }} </a>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        {{$settings->address}}
                    </li>
                </ul>
                <div class="header-top-right">
                    <div class="social-icon d-flex align-items-center">
                        <a href="{{ $settings->facebook_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $settings->twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $settings->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $settings->pinterest_url }}" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <!-- Header Area Start -->
    <header class="header-section-1">
        <div id="header-sticky" class="header-1">
            <div class="container-fluid">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <div class="header-left">
                            <div class="logo">
                                <a href="/" class="header-logo">
                                   <img src="{{ $settings->getFirstMediaUrl('logo') ?: asset('assets/img/logo/logo.svg') }}" alt="logo-img">
                                </a>
                            </div>
                        </div>
                        <div class="mean__menu-wrapper">
                            <div class="main-menu">
                                <nav id="mobile-menu">

<ul>

@foreach($categories as $category)
<li class="has-dropdown menu-thumb">

    <!-- 🔥 CATEGORY -->
    <a href="{{ route('categories', $category->slug) }}">
        {{ $category->name }}
    </a>

    <!-- 🔥 DROPDOWN -->
    <ul class="submenu">
        <li class="border-top-none">
<div class="container">
            <div class="row ">

                @foreach($category->subcategories->take(6) as $sub)
                <div class="col-lg-3 col-md-6">

                    <!-- SUBCATEGORY -->
                    <h6 class="home-menu-title">
                        {{ $sub->name }}
                    </h6>

                    <!-- PRODUCTS -->
                    <ul class="list-unstyled">

                        @forelse($sub->products->take(5) as $product)
                        <li>
                            <a href="{{ route('product.show', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </li>
                        @empty
                        <li>
                            <span>No Products</span>
                        </li>
                        @endforelse

                    </ul>

                </div>
                @endforeach

            </div>
            </div>

        </li>
    </ul>


</li>
@endforeach

</ul>

<style>
   /* 🔥 FORCE MEGA MENU FIX */
.main-menu ul li .submenu {
    width: 1200px !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    padding: 30px !important;
    display: block;
}

/* 🔥 IMPORTANT: li full width */
.main-menu ul li.has-dropdown {
    position: static !important;
}

/* 🔥 submenu absolute fix */
.main-menu ul li .submenu {
    position: absolute !important;
    top: 100%;
    z-index: 999;
}

/* 🔥 inner spacing */
.main-menu ul li .submenu .row {
    width: 100%;
}

/* 🔥 column spacing */
.main-menu ul li .submenu .col-lg-3 {
    margin-bottom: 20px;
}

/* 🔥 product list */
.main-menu ul li .submenu ul li a {
    display: block;
    font-size: 13px;
    padding: 4px 0;
}
</style>
                                </nav>
                            </div>
                        </div>
                        <div class="header-right d-flex justify-content-end align-items-center">
                            
                           @php
$cart = session('cart', []);
$count = count($cart);
@endphp

<div class="menu-cart">

    <a href="{{ route('cart.index') }}" >
        <i class="far fa-shopping-cart"></i>
    </a>

    @if($count > 0)
    <span class="cart-count">
        {{ $count }}
    </span>
    @endif

</div>
<style>
    .cart-count{
        position: absolute;
    top: -7px;
    right: -12px;
    content: "3";
    width: 18px;
    line-height: 18px;
    height: 18px;
    border-radius: 18px;
    background-color: var(--theme);
    color: var(--white);
    font-size: 12px;
    text-align: center;
    font-weight: 500;
    }
    
</style>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Sidebar Area Here -->
   

    <!-- Search Area Start -->
    
@yield('content')



     <!-- Footer Section Start -->
    <footer class="footer-section section-bg">
        <div class="container">
            <div class="footer-widgets-wrapper">
                <div class="row">
                    <div class="col-xl-4 col-sm-6 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <a href="/">
                        <img src="{{ $settings->getFirstMediaUrl('logo') ?: asset('assets/img/logo/logo.svg') }}" alt="logo-img">   
                                                 </a>
                            </div>
                            <div class="footer-content">
                            <p>
                                    {{ $settings->footer_text ?: 'Default contact info' }}
                            </p>
                              
                                <div class="social-icon d-flex align-items-center">
                                    <a href="{{ $settings->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ $settings->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="{{ $settings->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                                    <a href="{{ $settings->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="{{ $settings->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".4s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Usefull Links</h3>
                            </div>
                            <ul class="list-items">
                                <li>
                                    <a href="/">
                                        Home
                                    </a>
                                </li>
                               
                               
                               
                                <li>
                                    <a href="{{ route('blog.show', 'latest') }}">
                                        Blog
                                    </a>    
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-6 col-lg-5 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Our Categories</h3>
                            </div>
                            <ul class="list-items">
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('categories', $category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-6 col-lg-4 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Map & Location</h3>
                            </div>
                            <ul class="list-items">
                                <li >
    <iframe
        width="100%"
        height="200"
        frameborder="0"
        style="border:0"
        src="https://maps.google.com/maps?q={{ urlencode($settings->address) }}&output=embed"
        allowfullscreen>
    </iframe>
</li>
                     

                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-wrapper">
                    <p class="wow fadeInUp" data-wow-delay=".3s">Copyright 2025 © . All rights reserved.</p>
                    
                </div>
            </div>
        </div>
    </footer>

    

   <!--<< All JS Plugins >>-->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--<< Gsap Js >>-->
    <script src="{{ asset('assets/js/gsap/gsap.js') }}"></script>
    <!--<< Gsap Scroll To Pluging Js >>-->
    <script src="{{ asset('assets/js/gsap/gsap-scroll-to-plugin.js') }}"></script>
    <!--<< Gsap Scroll Smoother Js >>-->
    <script src="{{ asset('assets/js/gsap/gsap-scroll-smoother.js') }}"></script>
    <!--<< Gsap Scroll Trigger Js >>-->
    <script src="{{ asset('assets/js/gsap/gsap-scroll-trigger.js') }}"></script>
    <!--<< Gsap Split Text Js >>-->
    <script src="{{ asset('assets/js/gsap/gsap-split-text.js') }}"></script>
    <!--<< Nice Select Js >>-->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <!--<< Counterup Js >>-->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!--<< Main.js >>-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8c78df7c7c0f484497ecbca7046644da1771523124516" integrity="sha512-8DS7rgIrAmghBFwoOTujcf6D9rXvH8xm8JQ1Ja01h9QX8EzXldiszufYa4IFfKdLUKTTrnSFXLDkUEOTrZQ8Qg==" data-cf-beacon='{"version":"2024.11.0","token":"90f7972af14a48b4add7da2b74f5d675","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from modinatheme.com/html/printnow-html/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Mar 2026 14:00:43 GMT -->
</html>