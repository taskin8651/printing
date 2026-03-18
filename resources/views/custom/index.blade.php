@extends('custom.master')
@section('content')


<!-- Hero Section Start -->
    <section class="hero-section hero-1">
        <div class="swiper-dot-2">
            <div class="dots"></div>
        </div>
        <div class="container">
            <div class="swiper hero-slider">
                <div class="swiper-wrapper">
                 @foreach($products as $product)
<div class="swiper-slide">
    <div class="row g-4 align-items-center justify-content-between">
        
        <div class="col-lg-6">
            <div class="hero-content">
                <h1>{{ $product->name }}</h1>

                <p>
                    {{ Str::limit($product->description, 120) }}
                </p>
            </div>

            <div class="hero-button">
                <a href="{{ route('product.show', $product->slug) }}" class="theme-btn">
                    Order Now
                </a>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="hero-image">
                <div class="hero-img">
                    
                    <img src="{{ $product->getFirstMediaUrl('product_image') }}" alt="{{ $product->name }}">

                    <div class="circle-shape">
                        <img src="assets/img/hero/t-shirt-bg.png" alt="img">
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <section class="service-section fix section-padding pt-100">
        <div class="container">
            <div class="section-title text-center">
                <div class="sub-title wow fadeInUp">
                    <span>OUR CATEGORIES</span>
                </div>
                <h2 class="split-text right">
                    Our Impressuae Categories
                </h2>
            </div>
            <div class="service-wrapper">
               <div class="swiper service-slider">
    <div class="swiper-wrapper">

        @foreach($categories as $category)
        <div class="swiper-slide">
            <div class="service-image">

                <img src="{{ $category->getFirstMediaUrl('category_image') ?: asset('assets/img/service/01.jpg') }}" 
                     alt="{{ $category->name }}">

                <a href="{{ route('categories', $category->slug) }}" class="icon">
                    <i class="far fa-long-arrow-right"></i>
                </a>

                <div class="service-content">
                    <h3>
                        <a href="{{ route('categories', $category->slug) }}">
                            {{ $category->name }}
                        </a>
                    </h3>
                </div>

            </div>
        </div>
        @endforeach

    </div>

    <div class="swiper-dot mt-5">
        <div class="dot"></div>
    </div>
</div>
            </div>
        </div>
    </section>
                <!-- Service Section End -->


    @endsection