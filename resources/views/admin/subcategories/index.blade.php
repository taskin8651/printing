@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-4">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Subcategories</h2>

        <a href="{{ route('admin.subcategories.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Add Subcategory
        </a>
    </div>

    <table class="table w-full" id="subcategoryTable">
        <thead>
            <tr class="bg-gray-100">
                <th>ID</th>
                <th>Image</th>
                <th>Category</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($subcategories as $sub)
            <tr>
                <td>{{ $sub->id }}</td>

                <td>
                    <img src="{{ $sub->getFirstMediaUrl('subcategory_image') }}"
                         class="w-12 h-12 object-cover rounded">
                </td>

                <td>{{ $sub->category->name ?? '' }}</td>
                <td>{{ $sub->name }}</td>
                <td>{{ $sub->slug }}</td>

                <td class="flex gap-2">
                    <a href="{{ route('admin.subcategories.edit', $sub->id) }}"
                       class="bg-yellow-400 px-3 py-1 rounded text-white">
                        Edit
                    </a>

                    <form action="{{ route('admin.subcategories.destroy', $sub->id) }}"
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
    $('#subcategoryTable').DataTable();
</script>
@endsection