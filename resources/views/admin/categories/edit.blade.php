@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-6 max-w-lg">

    <h2 class="text-lg font-semibold mb-4">Edit Category</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name"
                   value="{{ $category->name }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label>Current Image</label><br>
            <img src="{{ $category->getFirstMediaUrl('category_image') }}"
                 class="w-20 h-20 rounded mb-2">
        </div>

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