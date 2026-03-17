@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-6 max-w-lg">

    <h2 class="text-lg font-semibold mb-4">Edit Subcategory</h2>

    <form action="{{ route('admin.subcategories.update', $subcategory->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Category --}}
        <div class="mb-4">
            <label>Category</label>
            <select name="category_id"
                    class="w-full border px-3 py-2 rounded">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $subcategory->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Name --}}
        <div class="mb-4">
            <label>Name</label>
            <input type="text"
                   name="name"
                   value="{{ $subcategory->name }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Current Image --}}
        <div class="mb-4">
            <label>Current Image</label><br>
            <img src="{{ $subcategory->getFirstMediaUrl('subcategory_image') }}"
                 class="w-20 h-20 rounded mb-2">
        </div>

        {{-- Change Image --}}
        <div class="mb-4">
            <label>Change Image</label>
            <input type="file" name="image"
                   class="w-full border px-3 py-2 rounded">
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>
</div>

@endsection