@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-6 max-w-3xl">

    <h2 class="text-lg font-semibold mb-4">Add Product</h2>

    <form action="{{ route('admin.products.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        {{-- Category --}}
        <div class="mb-4">
            <label>Category</label>
            <select id="category" name="category_id"
                    class="w-full border px-3 py-2 rounded">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Subcategory --}}
        <div class="mb-4">
            <label>Subcategory</label>
            <select id="subcategory" name="subcategory_id"
                    class="w-full border px-3 py-2 rounded">
                <option value="">Select Subcategory</option>
            </select>
        </div>

        {{-- Name --}}
        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- SKU --}}
        <div class="mb-4">
            <label>SKU</label>
            <input type="text" name="sku"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Stock --}}
        <div class="mb-4">
            <label>Stock</label>
            <input type="number" name="stock"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Base Price --}}
        <div class="mb-4">
            <label>Base Price</label>
            <input type="number" name="price"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Description --}}
        <div class="mb-4">
            <label>Description</label>
            <textarea name="description"
                      class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        {{-- =========================
             QUANTITY PRICING 🔥
        ==========================--}}
        <div class="mb-6">
            <label class="font-semibold">Quantity Pricing</label>

            <div id="pricing-wrapper">
                <div class="flex gap-2 mb-2">
                    <input type="number" name="quantity[]" placeholder="Quantity"
                           class="border px-2 py-1 w-1/2">

                    <input type="number" name="price_list[]" placeholder="Price"
                           class="border px-2 py-1 w-1/2">
                </div>
            </div>

            <button type="button" onclick="addPricing()"
                    class="text-blue-600 text-sm">+ Add More</button>
        </div>

        {{-- =========================
             VARIANTS 🔥
        ==========================--}}
        <div class="mb-6">
            <label class="font-semibold">Variants</label>

            <div id="variant-wrapper">
                <div class="flex gap-2 mb-2">
                    <input type="text" name="variant_name[]" placeholder="Type (Size)"
                           class="border px-2 py-1 w-1/2">

                    <input type="text" name="variant_value[]" placeholder="Value (M)"
                           class="border px-2 py-1 w-1/2">
                </div>
            </div>

            <button type="button" onclick="addVariant()"
                    class="text-blue-600 text-sm">+ Add Variant</button>
        </div>
<div class="mb-4">
        <label class="flex items-center gap-2">
    <input type="checkbox" name="is_featured" value="1">
    Featured Product
</label>
</div>

        {{-- =========================
             SEO 🔥
        ==========================--}}
        <div class="mb-4">
            <label>Meta Title</label>
            <input type="text" name="meta_title"
                   class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label>Meta Description</label>
            <textarea name="meta_description"
                      class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        {{-- Image --}}
        <div class="mb-4">
            <label>Main Image</label>
            <input type="file" name="image"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Gallery --}}
        <div class="mb-4">
            <label>Gallery Images</label>
            <input type="file" name="gallery[]" multiple
                   class="w-full border px-3 py-2 rounded">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Save Product
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
        let options = '<option value="">Select Subcategory</option>';

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