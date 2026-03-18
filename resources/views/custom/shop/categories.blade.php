@extends('custom.master')

@section('content')

<section class="shop-section fix section-padding">
    <div class="container">

        <!-- 🔥 CATEGORY HEADER -->
        <div class="section-title text-center mb-4">
            <h2>{{ $category->name }}</h2>
            <p>
                Showing <span>{{ $products->count() }}</span> 
                of {{ $products->total() }} Results
            </p>
        </div>

        <div class="row">

            @forelse($products as $product)

            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp">

                <div class="shop-items style-2">

                    <!-- 🖼 PRODUCT IMAGE -->
                    <div class="shop-image">

                        <img src="{{ $product->getFirstMediaUrl('product_image') ?: asset('assets/img/no-image.png') }}"
                             alt="{{ $product->name }}">

                        <!-- 🔥 ICONS -->
                        <ul class="product-icon d-grid justify-content-center align-items-center">
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </li>
                            <li><a href="#"><i class="fal fa-cart-plus"></i></a></li>
                        </ul>

                        <!-- ⭐ FEATURED -->
                        @if($product->is_featured)
                            <div class="offer-text">Featured</div>
                        @endif

                    </div>

                    <!-- 📦 PRODUCT CONTENT -->
                    <div class="shop-content text-center">

                        <h5>
                            <a href="{{ route('product.show', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </h5>

                        <ul class="price-list justify-content-center">
                            <li>₹{{ $product->min_price }}</li>
                        </ul>

                        <a href="{{ route('product.show', $product->slug) }}" class="theme-btn btn-sm mt-2">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

            @empty
                <div class="col-12 text-center">
                    <p>No Products Found</p>
                </div>
            @endforelse

        </div>

        <!-- 🔄 PAGINATION -->
        @if(method_exists($products, 'links'))
        <div class="page-nav-wrap mt-5 text-center wow fadeInUp">
            {{ $products->links() }}
        </div>
        @endif

    </div>
</section>

@endsection