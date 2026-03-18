@extends('custom.master')
@section('content')

<!-- 🔥 BREADCRUMB -->
<div class="breadcrumb-wrapper section-padding bg-cover" 
     style="background-image: url('{{ asset('assets/img/breadcrumb.png') }}');">
    <div class="container">
        <div class="page-heading text-center">
            <h1>{{ $product->name }}</h1>
            <ul class="breadcrumb-items">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="fal fa-minus"></i></li>
                <li>{{ $product->name }}</li>
            </ul>
        </div>
    </div>
</div>

<!-- 🔥 PRODUCT DETAILS -->
<section class="shop-details-section section-padding">
    <div class="container">
        <div class="shop-details-wrapper">
            <div class="row">

                <!-- 🖼 IMAGE GALLERY -->
                <div class="col-lg-5">
                    <div class="shop-details-image">

                        <div class="tab-content">
                            @foreach($product->getMedia('product_gallery') as $key => $media)
                                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="thumb{{ $key }}">
                                    <div class="shop-thumb">
                                        <img src="{{ $media->getUrl() }}" alt="img">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <ul class="nav mb-5">
                            @foreach($product->getMedia('product_gallery') as $key => $media)
                            <li class="nav-item">
                                <a href="#thumb{{ $key }}" data-bs-toggle="tab"
                                   class="nav-link {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ $media->getUrl() }}" alt="img">
                                </a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

                <!-- 📦 PRODUCT INFO -->
              <div class="col-lg-7">
    <div class="product-details-content">

        <!-- 🔥 NAME -->
        <h2 class="pb-3">{{ $product->name }}</h2>

         <!-- 📌 DETAILS -->
        
         <h6 class="details-info"><span>SKU:</span> <a href="#">{{ $product->sku ?? '-' }}</a></h6>


        <h6 class="details-info">
            <span>Category:</span> <a href="#">{{ $product->category->name ?? '-' }}</a>
        </h6>

        <h6 class="details-info">
            <span>Subcategory:</span> <a href="#">{{ $product->subcategory->name ?? '-' }}</a>
        </h6>

        <h6 class="details-info mb-3">
            <span>Stock:</span> 
          <a href="#">  {{ $product->in_stock ? 'In Stock' : 'Out of Stock' }}</a>
        </h6>

     

        <!-- 💰 BASE PRICE -->
      

       

      @if($product->variants->count())
<div class="mb-4">
    <h5>Select Options</h5>

    @php
        $grouped = $product->variants->groupBy('name');
    @endphp

    @foreach($grouped as $name => $values)
        <div class="mb-3">
            <label class="fw-bold d-block mb-2">
                {{ ucfirst($name) }}
            </label>

            <div class="d-flex flex-wrap gap-2">

                @foreach($values as $variant)
                <div class="form-check">

                    <input class="form-check-input variant-checkbox"
                           type="checkbox"
                           name="variants[{{ $name }}][]"
                           value="{{ $variant->value }}"
                           id="variant{{ $variant->id }}">

                    <label class="form-check-label text-uppercase" for="variant{{ $variant->id }}">
                        {{ $variant->value }}
                    </label>

                </div>
                @endforeach

            </div>
        </div>
    @endforeach

</div>
@endif

       @if($product->prices->count())
<div class="mb-4">
    <h5>Bulk Pricing</h5>

    @foreach($product->prices as $price)
    <div class="form-check mb-2">
        <input class="form-check-input price-radio"
               type="radio"
               name="bulk_price"
               id="price{{ $loop->index }}"
               data-qty="{{ $price->quantity }}"
               data-price="{{ $price->price }}">

        <label class="form-check-label" for="price{{ $loop->index }}">
            {{ $price->quantity }}+ pcs → ₹{{ $price->price }}
        </label>
    </div>
    @endforeach

</div>
@endif

<!-- 🔢 QUANTITY -->
<div class="cart-wrp">
    <div class="cart-quantity">
        <input type="number" id="quantity" value="1" min="1" class="form-control w-50">
    </div>
</div>

<!-- 💰 SELECTED PRICE -->
<div class="mt-3">
    <h4>Selected Price: ₹<span id="selectedPrice">{{ $product->min_price }}</span></h4>
</div>



        <!-- 🛒 BUTTONS -->
        <div class="shop-btn mt-3">
        <form id="addToCartForm" action="{{ route('cart.add') }}" method="POST">
    @csrf

    <!-- 🔥 PRODUCT -->
    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <!-- 🔢 QUANTITY -->
    <input type="hidden" name="quantity" id="cartQty" value="1">

    <!-- 💰 PRICE -->
    <input type="hidden" name="price" id="cartPrice" value="{{ $product->min_price }}">

    <!-- 🎨 VARIANTS (Dynamic) -->
    <div id="variantInputs"></div>

    <!-- ⚠️ OPTIONAL (DEBUG SHOW) -->
    {{-- <small>Qty: <span id="debugQty">1</span></small> --}}

    <!-- 🛒 BUTTON -->
    <button type="submit" class="theme-btn w-100">
        <span>Add to Cart</span>
    </button>
</form>

            <a href="#" class="theme-btn">
                <span>Share</span>
            </a>
        </div>

       

    </div>
</div>
            </div>

            
<script>
document.addEventListener("DOMContentLoaded", function () {

    const radios = document.querySelectorAll('.price-radio');
    const qtyInput = document.getElementById('quantity');
    const priceBox = document.getElementById('selectedPrice');

    const cartQty = document.getElementById('cartQty');
    const cartPrice = document.getElementById('cartPrice');

    // 👉 Radio select
    radios.forEach(radio => {
        radio.addEventListener('change', function () {

            let qty = this.dataset.qty;
            let price = this.dataset.price;

            qtyInput.value = qty;
            priceBox.innerText = price;

            cartQty.value = qty;
            cartPrice.value = price;
        });
    });

    // 👉 Manual quantity change
    qtyInput.addEventListener('input', function () {

        let enteredQty = parseInt(this.value);
        let matchedPrice = {{ $product->min_price }};

        radios.forEach(radio => {
            let rowQty = parseInt(radio.dataset.qty);
            let rowPrice = radio.dataset.price;

            if (enteredQty >= rowQty) {
                matchedPrice = rowPrice;
                radio.checked = true;
            }
        });

        priceBox.innerText = matchedPrice;
        cartQty.value = enteredQty;
        cartPrice.value = matchedPrice;
    });

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById('addToCartForm');
    const variantInputs = document.getElementById('variantInputs');

    form.addEventListener('submit', function () {

        variantInputs.innerHTML = '';

        let checkedVariants = document.querySelectorAll('.variant-checkbox:checked');

        checkedVariants.forEach((el) => {

            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'variants[]';
            input.value = el.value;

            variantInputs.appendChild(input);
        });

        // 👉 Debug (optional)
        console.log("Variants:", checkedVariants.length);
    });

});
</script>

            <!-- 🔥 DESCRIPTION TAB -->
          <div class="single-tab">

    <!-- 🔥 TAB MENU -->
    <ul class="nav mb-5">

        <li class="nav-item">
            <a href="#description" data-bs-toggle="tab" class="nav-link ps-0 active">
                <h6>Description</h6>
            </a>
        </li>

        <li class="nav-item">
            <a href="#additional" data-bs-toggle="tab" class="nav-link">
                <h6>Additional Information</h6>
            </a>
        </li>

        <li class="nav-item">
            <a href="#review" data-bs-toggle="tab" class="nav-link">
                <h6>Reviews</h6>
            </a>
        </li>

    </ul>

    <!-- 🔥 TAB CONTENT -->
    <div class="tab-content">

        <!-- 📄 DESCRIPTION -->
        <div id="description" class="tab-pane fade show active">
            <div class="description-items">
                <div class="description-content">

                    <h3>Product Description</h3>

                    <p class="mb-4">
                        {{ $product->description }}
                    </p>

                </div>
            </div>
        </div>

        <!-- 📦 ADDITIONAL INFO -->
        <div id="additional" class="tab-pane fade">
            <div class="table-responsive mb-15">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <td>SKU</td>
                            <td>{{ $product->sku ?? '-' }}</td>
                        </tr>

                        <tr>
                            <td>Category</td>
                            <td>{{ $product->category->name ?? '-' }}</td>
                        </tr>

                        <tr>
                            <td>Subcategory</td>
                            <td>{{ $product->subcategory->name ?? '-' }}</td>
                        </tr>

                        <tr>
                            <td>Stock</td>
                            <td>
                                {{ $product->in_stock ? 'In Stock' : 'Out of Stock' }}
                            </td>
                        </tr>

                        <tr>
                            <td>Base Price</td>
                            <td>₹{{ $product->price }}</td>
                        </tr>

                        <tr>
                            <td>Minimum Price</td>
                            <td>₹{{ $product->min_price }}</td>
                        </tr>

                        <!-- 🔥 VARIANTS -->
                        @if($product->variants->count())
                        <tr>
                            <td>Variants</td>
                            <td>
                                @foreach($product->variants->groupBy('name') as $name => $values)
                                    <strong>{{ ucfirst($name) }}:</strong>
                                    {{ $values->pluck('value')->join(', ') }} <br>
                                @endforeach
                            </td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>

        <!-- ⭐ REVIEWS -->
        <div id="review" class="tab-pane fade">

            <div class="review-items">

                <!-- 🔥 STATIC FOR NOW (DB READY LATER) -->
                <div class="text-center">
                    <p>No reviews yet</p>
                </div>

                <!-- 🔥 ADD REVIEW FORM -->
                <div class="review-title mt-5 py-15 mb-30">
                    <h4>Add a Review</h4>
                </div>

                <div class="review-form">
                    <form action="#" method="POST">
                        @csrf

                        <div class="row g-4">

                            <div class="col-lg-6">
                                <input type="text" name="name" placeholder="Full Name" class="form-control">
                            </div>

                            <div class="col-lg-6">
                                <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>

                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Your Review" class="form-control"></textarea>
                            </div>

                            <div class="col-lg-6">
                                <button type="submit" class="theme-btn">
                                    Submit Review
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</div>
        </div>
    </div>
</section>

<!-- 🔥 RELATED PRODUCTS -->
<section class="product-section fix section-padding pt-0">
    <div class="container">

        <div class="section-title text-center">
            <h2>Related Products</h2>
        </div>

        <div class="swiper product-slider">
            <div class="swiper-wrapper">

                @foreach($relatedProducts as $item)
                <div class="swiper-slide">

                    <div class="products-box-items">

                        <ul class="product-top">
                            <li>{{ $item->subcategory->name ?? '' }}</li>
                            <li>₹{{ $item->min_price }}</li>
                        </ul>

                        <div class="product-thumb">
                            <img src="{{ $item->getFirstMediaUrl('product_image') ?: asset('no-image.png') }}">

                            <a href="{{ route('product.show', $item->slug) }}" class="theme-btn">
                                View Product
                            </a>
                        </div>

                        <div class="product-content text-center">
                            <h4>
                                <a href="{{ route('product.show', $item->slug) }}">
                                    {{ $item->name }}
                                </a>
                            </h4>
                        </div>

                    </div>

                </div>
                @endforeach

            </div>
        </div>

    </div>
</section>

@endsection