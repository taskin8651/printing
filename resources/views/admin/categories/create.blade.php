@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-6 max-w-lg">

    <h2 class="text-lg font-semibold mb-4">Add Category</h2>

    <form action="{{ route('admin.categories.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name"
                   class="w-full border px-3 py-2 rounded">
        </div>

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