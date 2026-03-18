@extends('custom.master')

@section('content')

<section class="shop-section fix section-padding">
    <div class="container">

        <!-- 🔥 HEADER -->
        <div class="section-title text-center mb-4">
            <h2>{{ $subcategory->name }}</h2>
            <p>
                Showing <span>{{ $products->count() }}</span> 
                of {{ $products->total() }} Results
            </p>
        </div>

        <!-- 🔥 SORTING -->
        <div class="d-flex justify-content-end mb-4">
            <form method="GET">
                <select name="sort" onchange="this.form.submit()" class="form-select w-auto">
                    <option value="">Default</option>
                    <option value="low" {{ request('sort')=='low' ? 'selected' : '' }}>
                        Price Low → High
                    </option>
                    <option value="high" {{ request('sort')=='high' ? 'selected' : '' }}>
                        Price High → Low
                    </option>
                </select>
            </form>
        </div>

        <div class="row">

            @forelse($products as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp">

                <div class="shop-items style-2">

                    <!-- IMAGE -->
                    <div class="shop-image">
                        <img src="{{ $product->getFirstMediaUrl('product_image') ?: asset('no-image.png') }}"
                             alt="{{ $product->name }}">

                        <!-- ICONS -->
                        <ul class="product-icon d-grid justify-content-center align-items-center">
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </li>
                            <li><a href="#"><i class="fal fa-cart-plus"></i></a></li>
                        </ul>

                        @if($product->is_featured)
                            <div class="offer-text">Featured</div>
                        @endif
                    </div>

                    <!-- CONTENT -->
                    <div class="shop-content text-center">
                        <h5>
                            <a href="{{ route('product.show', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        </h5>

                        <ul class="price-list justify-content-center">
                            <li>₹{{ $product->min_price }}</li>
                        </ul>
                    </div>

                </div>

            </div>
            @empty
                <div class="text-center">
                    <p>No Products Found</p>
                </div>
            @endforelse

        </div>

        <!-- PAGINATION -->
        <div class="page-nav-wrap mt-5 text-center">
            {{ $products->links() }}
        </div>

    </div>
</section>

@endsection