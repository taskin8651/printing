@php 
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Setting;

$categories = Category::all();
$subcategories = Subcategory::all();
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
                                <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-xl-block">
                        This involves interactions between a business and its customers. It's about meeting customers' needs and resolving their problems. Effective customer service is crucial.
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
                                    <a target="_blank" href="#">Main Street, Melbourne, Australia</a>
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
    <div class="header-top-section">
        <div class="container-fluid">
            <div class="header-top-wrapper justify-content-center">
                <p>Happiness guarantee - Free shipping over $55 - Delivery in 3-6 business days</p>
            </div>
        </div>
    </div>

    <!-- Middle Section Start -->
    <div class="middle-section">
        <div class="container-fluid">
            <div class="header-middle-wrapper">
            
                <a href="/" class="logo">
                    <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="img">
                </a>

                
                <div class="header-right d-flex justify-content-end align-items-center">
                    <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                    <a href="sign-in.html" class="user-icon"><i class="far fa-user"></i></a>
                    <div class="menu-cart">
                        <button id="openButton" class="cart-icon">
                            <i class="far fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="header-sticky" class="header-4">
        <div class="container">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <a href="index.html" class="header-logo">
                        <img src="assets/img/logo/logo.svg" alt="img">
                    </a>
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                              <ul class="main-nav">
    @foreach($categories as $cat)
        <li class="nav-item has-mega" data-id="{{ $cat->id }}">
<a href="{{ route('categories', $cat->slug) }}">
    {{ $cat->name }}
</a>
        </li>
    @endforeach
</ul>

<!-- MEGA MENU -->
<div class="mega-menu">

    @foreach($categories as $cat)
        <div class="mega-content {{ $loop->first ? 'active' : '' }}" id="mega-{{ $cat->id }}">

            <div class="mega-grid">

                @foreach($cat->subcategories as $sub)
                    <div class="mega-col">

                        <h5>
                            <a href="{{ route('shop', $sub->slug) }}">
                                {{ $sub->name }}
                            </a>
                        </h5>

                        <ul>
                            @foreach($sub->products->take(5) as $product)
                                <li>
                                    <a href="">
                                        {{ $product->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                @endforeach

            </div>

        </div>
    @endforeach

</div>

<style>
    /* NAV */
.main-nav {
    display: flex;
    gap: 25px;
    align-items: center;
}

/* MEGA MENU */
.mega-menu {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: #f3f3f3;
    display: none;
    padding: 30px;
    z-index: 999;
}

/* SHOW */
.main-nav:hover + .mega-menu,
.mega-menu:hover {
    display: block;
}

/* GRID */
.mega-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 30px;
}

/* CONTENT SWITCH */
.mega-content {
    display: none;
}
.mega-content.active {
    display: block;
}
</style>

<script>
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('mouseenter', function () {

            let id = this.dataset.id;

            // remove active
            document.querySelectorAll('.mega-content').forEach(c => c.classList.remove('active'));

            // show selected
            document.getElementById('mega-' + id).classList.add('active');

            // show mega menu
            document.querySelector('.mega-menu').style.display = 'block';
        });
    });

    // hide when leaving
    document.querySelector('.mega-menu').addEventListener('mouseleave', function () {
        this.style.display = 'none';
    });
</script>
                            </nav>
                        </div>
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <div class="header__hamburger d-xl-none my-auto">
                            <div class="sidebar__toggle">
                               <img src="assets/img/toggle.svg" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Area Here -->
    <div id="targetElement" class="side_bar slideInRight side_bar_hidden">
        <div class="side_bar_overlay"></div>
        <div class="cart-title mb-50">
            <h4>Shopping cart</h4>
        </div>
        <div class="cartmini__widget">
            <div class="cartmini__widget-item">
                <div class="cartmini__thumb">
                    <a href="product-details.html">
                   <img src="assets/img/header/product-1.jpg" alt="img">
                </a>
                </div>
                <div class="cartmini__content">
                    <h5><a href="product-details.html">Level Bolt Smart Lock</a></h5>
                    <div class="cartmini__price-wrapper">
                        <span class="cartmini__price">$46.00</span>
                        <span class="cartmini__quantity">x2</span>
                    </div>
                </div>
                <button class="cartmini__del"><i class="fal fa-times"></i></button>
            </div>
            <div class="cartmini__widget-item">
                <div class="cartmini__thumb">
                    <a href="product-details.html">
                        <img src="assets/img/header/product-2.jpg" alt="img">
                    </a>
                </div>
                <div class="cartmini__content">
                    <h5><a href="product-details.html">Trademil for younger</a></h5>
                    <div class="cartmini__price-wrapper">
                        <span class="cartmini__price">$78.00</span>
                        <span class="cartmini__quantity">x1</span>
                    </div>
                </div>
                <button class="cartmini__del"><i class="fal fa-times"></i></button>
            </div>
            <div class="cartmini__widget-item">
                <div class="cartmini__thumb">
                    <a href="product-details.html">
                        <img src="assets/img/header/product-3.jpg" alt="img">
                    </a>
                </div>
                <div class="cartmini__content">
                    <h5><a href="product-details.html">ViewSonic VP2756-2K</a></h5>
                    <div class="cartmini__price-wrapper">
                        <span class="cartmini__price">$98.00</span>
                        <span class="cartmini__quantity">x3</span>
                    </div>
                </div>
                <button class="cartmini__del"><i class="fal fa-times"></i></button>
            </div>
            <div class="cartmini__checkout">
                <div class="cartmini__checkout-title mb-4">
                    <h4>Subtotal:</h4>
                    <span>$113.00</span>
                </div>
                <div class="cartmini__checkout-btn">
                    <a href="shop-cart.html" class="theme-btn mb-2 w-100"> view cart</a>
                    <a href="checkout.html" class="theme-btn w-100 style-2"> checkout</a>
                </div>
            </div>
        </div>
        <button id="closeButton" class="x-mark-icon"><i class="fas fa-times"></i></button>
    </div>

    <!-- Search Area Start -->
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fas fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get">
                    <div class="search-field-holder">
                        <input type="search" class="main-search-input" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </div>
@yield('content')



     <!-- Footer Section Start -->
    <footer class="footer-section section-bg">
        <div class="container">
            <div class="footer-widgets-wrapper">
                <div class="row">
                    <div class="col-xl-4 col-sm-6 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <a href="index.html">
                                    <img src="assets/img/logo/logo.svg" alt="logo-img">
                                </a>
                            </div>
                            <div class="footer-content">
                            <p>
                                    A new way to make the payments easy
                                    reliable <br> and 100% secure. claritatem itamconse quat. <br> Exerci tation ullamcorper.
                            </p>
                                <div class="play-app">
                                    <img src="assets/img/play.png" alt="img">
                                    <img src="assets/img/app.png" alt="img">
                                </div>
                                <div class="social-icon d-flex align-items-center">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
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
                                    <a href="contact.html">
                                        Contact us
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        How it Works
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        Create
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        Explore
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Terms &amp; Services
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-6 col-lg-5 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Our office</h3>
                            </div>
                            <ul class="list-items">
                                <li>
                                    <a href="news.html">
                                        Newslatter & Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Carrer & Contact
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        Monthly Offer
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        Affiliate Program
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        Referrel Programms
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-6 col-lg-4 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Find It Fast</h3>
                            </div>
                            <ul class="list-items">
                                <li>
                                    <a href="service-details.html">
                                        Flexographic Printing.
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        Computer & Laptop
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        Surface Printing.
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        Brochure & Home gift
                                    </a>
                                </li>
                                <li>
                                    <a href="service-details.html">
                                        Digital Printing.
                                    </a>
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
                    <img src="assets/img/card.png" alt="img" class="wow fadeInUp" data-wow-delay=".5s">
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