@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-6 max-w-3xl">

    <h2 class="text-lg font-semibold mb-4">Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Category --}}
        <div class="mb-4">
            <label>Category</label>
            <select id="category" name="category_id"
                    class="w-full border px-3 py-2 rounded">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Subcategory --}}
        <div class="mb-4">
            <label>Subcategory</label>
            <select id="subcategory" name="subcategory_id"
                    class="w-full border px-3 py-2 rounded">
                @foreach($subcategories as $sub)
                    <option value="{{ $sub->id }}"
                        {{ $product->subcategory_id == $sub->id ? 'selected' : '' }}>
                        {{ $sub->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Name --}}
        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name"
                   value="{{ $product->name }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- SKU --}}
        <div class="mb-4">
            <label>SKU</label>
            <input type="text" name="sku"
                   value="{{ $product->sku }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Stock --}}
        <div class="mb-4">
            <label>Stock</label>
            <input type="number" name="stock"
                   value="{{ $product->stock }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Price --}}
        <div class="mb-4">
            <label>Base Price</label>
            <input type="number" name="price"
                   value="{{ $product->price }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Description --}}
        <div class="mb-4">
            <textarea name="description"
                      class="w-full border px-3 py-2 rounded">{{ $product->description }}</textarea>
        </div>

        {{-- ======================
            QUANTITY PRICING 🔥
        ======================= --}}
        <div class="mb-6">
            <label class="font-semibold">Quantity Pricing</label>

            <div id="pricing-wrapper">

                @foreach($product->prices as $price)
                <div class="flex gap-2 mb-2">
                    <input type="number" name="quantity[]"
                           value="{{ $price->quantity }}"
                           class="border px-2 py-1 w-1/2">

                    <input type="number" name="price_list[]"
                           value="{{ $price->price }}"
                           class="border px-2 py-1 w-1/2">
                </div>
                @endforeach

            </div>

            <button type="button" onclick="addPricing()"
                    class="text-blue-600 text-sm">+ Add More</button>
        </div>

        {{-- ======================
            VARIANTS 🔥
        ======================= --}}
        <div class="mb-6">
            <label class="font-semibold">Variants</label>

            <div id="variant-wrapper">

                @foreach($product->variants as $variant)
                <div class="flex gap-2 mb-2">
                    <input type="text" name="variant_name[]"
                           value="{{ $variant->name }}"
                           class="border px-2 py-1 w-1/2">

                    <input type="text" name="variant_value[]"
                           value="{{ $variant->value }}"
                           class="border px-2 py-1 w-1/2">
                </div>
                @endforeach

            </div>

            <button type="button" onclick="addVariant()"
                    class="text-blue-600 text-sm">+ Add Variant</button>
        </div>

        {{-- SEO --}}
        <div class="mb-4">
            <label>Meta Title</label>
            <input type="text" name="meta_title"
                   value="{{ $product->meta_title }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label>Meta Description</label>
            <textarea name="meta_description"
                      class="w-full border px-3 py-2 rounded">{{ $product->meta_description }}</textarea>
        </div>

        {{-- IMAGE --}}
        <div class="mb-4">
            <label>Current Image</label><br>
            <img src="{{ $product->getFirstMediaUrl('product_image') }}"
                 class="w-20 h-20 mb-2">
        </div>

        <div class="mb-4">
            <input type="file" name="image"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- GALLERY --}}
        <div class="mb-4">
            <label>Gallery</label><br>

            @foreach($product->getMedia('product_gallery') as $img)
                <img src="{{ $img->getUrl() }}"
                     class="w-16 h-16 inline-block mr-2 mb-2">
            @endforeach
        </div>

        <div class="mb-4">
            <input type="file" name="gallery[]" multiple
                   class="w-full border px-3 py-2 rounded">
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Update Product
        </button>

    </form>
</div>

@endsection


@section('scripts')

<script>

/* CATEGORY → SUBCATEGORY */
$('#category').on('change', function () {
    let id = $(this).val();

    $('#subcategory').html('<option>Loading...</option>');

    $.get('/admin/get-subcategories/' + id, function (data) {
        let options = '';

        data.forEach(function (item) {
            options += `<option value="${item.id}">${item.name}</option>`;
        });

        $('#subcategory').html(options);
    });
});

/* ADD PRICING */
function addPricing() {
    let html = `
    <div class="flex gap-2 mb-2">
        <input type="number" name="quantity[]" class="border px-2 py-1 w-1/2">
        <input type="number" name="price_list[]" class="border px-2 py-1 w-1/2">
    </div>`;
    document.getElementById('pricing-wrapper').insertAdjacentHTML('beforeend', html);
}

/* ADD VARIANT */
function addVariant() {
    let html = `
    <div class="flex gap-2 mb-2">
        <input type="text" name="variant_name[]" class="border px-2 py-1 w-1/2">
        <input type="text" name="variant_value[]" class="border px-2 py-1 w-1/2">
    </div>`;
    document.getElementById('variant-wrapper').insertAdjacentHTML('beforeend', html);
}

</script>

@endsection