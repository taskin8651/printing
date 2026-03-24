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
                 @foreach($heros as $product)
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


               <!-- Shop Section Start -->
<section class="shop-section fix section-padding">
    <div class="container">

        <!-- 🔥 SECTION TITLE -->
        <div class="section-title text-center mb-5">
            <div class="sub-title wow fadeInUp">
                <span>Our Products</span>
            </div>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                Explore Our Products
            </h2>
        </div>

        <div class="row">

            @foreach($products as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp">

                <div class="shop-items style-2 mt-0">

                    <!-- 🖼 IMAGE -->
                    <div class="shop-image">
                        <img src="{{ $product->getFirstMediaUrl('product_image') ?: asset('assets/img/shop/01.jpg') }}" alt="img">

                        <ul class="product-icon d-grid justify-content-center align-items-center">
                            <li>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <i class="fal fa-cart-plus"></i>
                                </a>
                            </li>
                        </ul>

                        @if($product->is_featured)
                            <div class="offer-text">Featured</div>
                        @endif
                    </div>

                    <!-- 📦 CONTENT -->
                    <div class="shop-content">
                        <h5>
                            <a href="{{ route('product.show', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </h5>

                        <ul class="price-list">
                            <li>₹{{ $product->min_price }}</li>
                        </ul>
                    </div>

                </div>

            </div>
            @endforeach

        </div>

    </div>
</section>
        <!-- Shop Section End -->

        <!-- Featured Products Section Start -->
   <section class="shop-section fix section-padding">
    <div class="container">

        <div class="section-title text-center mb-5">
            <h2>Featured Products</h2>
        </div>

        <div class="row">
            @foreach($featured as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp">

                <div class="shop-items style-2 mt-0">

                    <div class="shop-image">
                        <img src="{{ $product->getFirstMediaUrl('product_image') ?: asset('assets/img/shop/01.jpg') }}">

                        <ul class="product-icon d-grid justify-content-center align-items-center">
                            <li>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <i class="fal fa-cart-plus"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="offer-text">Featured</div>
                    </div>

                    <div class="shop-content">
                        <h5>
                            <a href="{{ route('product.show', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </h5>

                        <ul class="price-list">
                            <li>₹{{ $product->min_price }}</li>
                        </ul>
                    </div>

                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- Featured Products Section End -->


<!-- Best Seller Section Start -->
<section class="shop-section fix section-padding pt-0">
    <div class="container">

        <div class="section-title text-center mb-5">
            <h2>Best Seller</h2>
        </div>

        <div class="row">
            @foreach($bestSeller as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp">

                <div class="shop-items style-2 mt-0">

                    <div class="shop-image">
                        <img src="{{ $product->getFirstMediaUrl('product_image') ?: asset('assets/img/shop/01.jpg') }}">

                        <ul class="product-icon d-grid justify-content-center align-items-center">
                            <li>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <i class="fal fa-cart-plus"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="offer-text">Best Seller</div>
                    </div>

                    <div class="shop-content">
                        <h5>
                            <a href="{{ route('product.show', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </h5>

                        <ul class="price-list">
                            <li>₹{{ $product->min_price }}</li>
                        </ul>
                    </div>

                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- Best Seller Section End -->


<!-- Trending Products Section Start -->
<section class="shop-section fix section-padding pt-0">
    <div class="container">

        <div class="section-title text-center mb-5">
            <h2>Trending Products</h2>
        </div>

        <div class="row">
            @foreach($trending as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp">

                <div class="shop-items style-2 mt-0">

                    <div class="shop-image">
                        <img src="{{ $product->getFirstMediaUrl('product_image') ?: asset('assets/img/shop/01.jpg') }}">

                        <ul class="product-icon d-grid justify-content-center align-items-center">
                            <li>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <i class="fal fa-cart-plus"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="offer-text">Trending</div>
                    </div>

                    <div class="shop-content">
                        <h5>
                            <a href="{{ route('product.show', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </h5>

                        <ul class="price-list">
                            <li>₹{{ $product->min_price }}</li>
                        </ul>
                    </div>

                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Trending Products Section End -->
 

<section class="testimonial-section fix section-bg section-padding">
    <div class="container">

        <div class="section-title text-center">
            <div class="sub-title wow fadeInUp">
                <span>Our clients say</span>
            </div>
            <h2 class="split-text right">
                Here's What Our Users <br> Speak About Us
            </h2>
        </div>

        <div class="swiper testimonial-slider-3">
            <div class="swiper-wrapper">

                @foreach($testimonials as $testimonial)
                <div class="swiper-slide">

                    <div class="testimonial-box-items style-2">

                        <div class="client-info">

                            <div class="client-item">

                                <!-- 🖼 IMAGE (optional fallback) -->
                                <div class="client-img bg-cover"
                                     style="background-image: url('{{ asset('assets/img/testimonial/01.png') }}');">
                                </div>

                                <div class="content">
                                    <h4>{{ $testimonial->name }}</h4>
                                    <span>{{ $testimonial->designation }}</span>
                                </div>

                            </div>

                            <!-- ⭐ RATING -->
                            <div class="star">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? '' : 'text-muted' }}"></i>
                                @endfor
                            </div>

                        </div>

                        <!-- 💬 MESSAGE -->
                        <p>
                            {{ $testimonial->message }}
                        </p>

                    </div>

                </div>
                @endforeach

            </div>

            <div class="swiper-dot mt-5">
                <div class="dot"></div>
            </div>

        </div>

    </div>
</section>



<section class="news-section fix section-padding pt-0">
    <div class="container">

        <div class="section-title text-center">
            <div class="sub-title wow fadeInUp">
                <span>Latest News & Blog</span>
            </div>
            <h2 class="split-text right">
                Latest News & Blog
            </h2>
        </div>

        <div class="row">

            @foreach($blogs as $blog)
            <div class="col-xl-4 col-lg-6">

                <div class="single-news-style-1 reveal fix">

                    <!-- 🖼 IMAGE -->
                    <div class="news-image">
                        <img src="{{ $blog->getFirstMediaUrl('blog_image') ?: asset('assets/img/news/01.jpg') }}" alt="blog-img">

                        <div class="post-cat">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="cat-name">
                                Blog
                            </a>
                        </div>
                    </div>

                    <!-- 📝 CONTENT -->
                    <div class="news-content">

                        <div class="author-item mb-3">
                            <ul>
                                <li>
                                    <i class="fal fa-calendar-alt"></i>
                                    {{ $blog->created_at->format('M d, Y') }}
                                </li>
                            </ul>

                            <div class="post-author d-flex align-items-center">
                                <img src="{{ asset('assets/img/news/author.png') }}">
                                <p>Admin</p>
                            </div>
                        </div>

                        <h3>
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                {{ $blog->title }}
                            </a>
                        </h3>

                        <p>
                            {{ $blog->short_description }}
                        </p>

                        <a href="{{ route('blog.show', $blog->slug) }}" class="link-btn">
                            Read More <i class="fas fa-chevron-right"></i>
                        </a>

                    </div>

                </div>

            </div>
            @endforeach

        </div>

    </div>
</section>


<div class="brand-section fix section-padding pt-0">
    <div class="container">

        <div class="brand-wrapper">

            <h6 class="text-center wow fadeInUp">
                Clients Sponsor Products
            </h6>

            <div class="swiper brand-slider">
                <div class="swiper-wrapper">

                    @foreach($brands as $brand)
                    <div class="swiper-slide">

                        <div class="brand-image text-center">

                            <img 
                                src="{{ $brand->getFirstMediaUrl('logo') ?: asset('assets/img/brand/brand-logo-1.png') }}" 
                                alt="{{ $brand->name }}"
                            >

                        </div>

                    </div>
                    @endforeach

                </div>
            </div>

        </div>

    </div>
</div>


    @endsection