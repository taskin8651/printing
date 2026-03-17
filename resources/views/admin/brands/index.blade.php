@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-4">
        <h2 class="font-semibold">Brands</h2>

        <a href="{{ route('admin.brands.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add
        </a>
    </div>

    <table class="w-full">
        <thead>
            <tr class="bg-gray-100">
                <th>Logo</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td>
                    <img src="{{ $brand->getFirstMediaUrl('logo') }}"
                         class="h-10">
                </td>

                <td>{{ $brand->name }}</td>

                <td class="flex gap-2">
                    <a href="{{ route('admin.brands.edit',$brand->id) }}"
                       class="bg-green-500 text-white px-2 py-1 rounded">Edit</a>

                    <form action="{{ route('admin.brands.destroy',$brand->id) }}" method="POST">
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