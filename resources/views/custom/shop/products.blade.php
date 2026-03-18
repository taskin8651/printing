@extends('custom.master')
@section('content')

<!-- Breadcrumb -->


<!-- Shop Section -->
<section class="shop-section fix section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                {{-- RESULT COUNT --}}
                <div class="woocommerce-notices-wrapper wow fadeInUp">
                    <p>
                        Showing <span>{{ $products->count() }}</span>
                        of {{ $products->total() }} Results
                    </p>
                </div>

                <div class="row">

                    @forelse($products as $product)

                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp">

                        <div class="shop-items style-2">

                            {{-- IMAGE --}}
                            <div class="shop-image">
                                <img src="{{ $product->getFirstMediaUrl('product_image') }}"
                                     alt="{{ $product->name }}">

                                {{-- ICONS --}}
                                <ul class="product-icon d-grid justify-content-center align-items-center">
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fal fa-cart-plus"></i></a></li>
                                </ul>

                                {{-- FEATURED --}}
                                @if($product->is_featured)
                                    <div class="offer-text">Featured</div>
                                @endif
                            </div>

                            {{-- CONTENT --}}
                            <div class="shop-content">
                                <h5>
                                    <a href="#">
                                        {{ $product->name }}
                                    </a>
                                </h5>

                                <ul class="price-list">
                                    <li>₹{{ $product->min_price }}</li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    @empty
                        <div class="col-12 text-center">
                            <p>No Products Found</p>
                        </div>
                    @endforelse

                </div>

                {{-- PAGINATION --}}
                <div class="page-nav-wrap mt-5 text-center wow fadeInUp">

                    {{ $products->links() }}

                </div>

            </div>

        </div>
    </div>
</section>

@endsection