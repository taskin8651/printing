@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-6 max-w-lg">

    <h2 class="text-lg font-semibold mb-4">Add Subcategory</h2>

    <form action="{{ route('admin.subcategories.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        {{-- Category Select --}}
        <div class="mb-4">
            <label>Category</label>
            <select name="category_id"
                    class="w-full border px-3 py-2 rounded">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Name --}}
        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Image --}}
        <div class="mb-4">
            <label>Image</label>
            <input type="file" name="image"
                   class="w-full border px-3 py-2 rounded">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Save
        </button>

    </form>
</div>

@endsection