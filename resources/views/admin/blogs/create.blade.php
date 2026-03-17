@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-xl">

    <h2 class="mb-4 font-semibold">Add Blog</h2>

    <form method="POST" enctype="multipart/form-data"
          action="{{ route('admin.blogs.store') }}">
        @csrf

        <input type="text" name="title" placeholder="Title"
               class="w-full mb-3 border p-2">

        <textarea name="short_description" placeholder="Short Description"
                  class="w-full mb-3 border p-2"></textarea>

        <textarea name="description" placeholder="Description"
                  class="w-full mb-3 border p-2"></textarea>

        <input type="file" name="image" class="mb-3">

        <button class="bg-blue-600 text-white px-4 py-2">Save</button>
    </form>

</div>

@endsection