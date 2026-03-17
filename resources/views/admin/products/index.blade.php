@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-4">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Products</h2>

        <a href="{{ route('admin.products.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Add Product
        </a>
    </div>

    <table class="table w-full" id="productTable">
        <thead>
            <tr class="bg-gray-100">
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>

                <td>
                    <img src="{{ $product->getFirstMediaUrl('product_image') }}"
                         class="w-12 h-12 object-cover rounded">
                </td>

                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? '' }}</td>
                <td>{{ $product->subcategory->name ?? '' }}</td>
                <td>₹{{ $product->price }}</td>

                <td class="flex gap-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                       class="bg-yellow-400 px-3 py-1 rounded text-white">
                        Edit
                    </a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 px-3 py-1 rounded text-white">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection

@section('scripts')
<script>
    $('#productTable').DataTable();
</script>
@endsection