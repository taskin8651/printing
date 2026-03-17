@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-4">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Categories</h2>

        <a href="{{ route('admin.categories.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Add Category
        </a>
    </div>

    <table class="table w-full" id="categoryTable">
        <thead>
            <tr class="bg-gray-100">
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>

                <td>
                    <img src="{{ $category->getFirstMediaUrl('category_image') }}"
                         class="w-12 h-12 object-cover rounded">
                </td>

                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>

                <td class="flex gap-2">
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                       class="bg-yellow-400 px-3 py-1 rounded text-white">
                        Edit
                    </a>

                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
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
    $('#categoryTable').DataTable();
</script>
@endsection