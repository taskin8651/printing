@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-xl">

    <h2 class="mb-4 font-semibold">Edit Blog</h2>

    <form method="POST" enctype="multipart/form-data"
          action="{{ route('admin.blogs.update',$blog->id) }}">
        @csrf @method('PUT')

        <input type="text" name="title" value="{{ $blog->title }}"
               class="w-full mb-3 border p-2">

        <textarea name="short_description"
                  class="w-full mb-3 border p-2">{{ $blog->short_description }}</textarea>

        <textarea name="description"
                  class="w-full mb-3 border p-2">{{ $blog->description }}</textarea>

        {{-- Current Image --}}
        <img src="{{ $blog->getFirstMediaUrl('blog_image') }}"
             class="w-24 mb-2">

        <input type="file" name="image" class="mb-3">

        <button class="bg-green-600 text-white px-4 py-2">Update</button>
    </form>

</div>

@endsection