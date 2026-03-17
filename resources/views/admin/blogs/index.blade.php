@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Blogs</h2>

        <a href="{{ route('admin.blogs.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add
        </a>
    </div>

    <table class="w-full">
        <thead>
            <tr class="bg-gray-100">
                <th>Image</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>
                    <img src="{{ $blog->getFirstMediaUrl('blog_image') }}"
                         class="w-16 h-12 object-cover">
                </td>

                <td>{{ $blog->title }}</td>

                <td class="flex gap-2">
                    <a href="{{ route('admin.blogs.edit',$blog->id) }}"
                       class="bg-green-500 text-white px-2 py-1 rounded">Edit</a>

                    <form action="{{ route('admin.blogs.destroy',$blog->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection