@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-xl">

    <h2 class="mb-4 font-semibold">Edit Brand</h2>

    <form method="POST" enctype="multipart/form-data"
          action="{{ route('admin.brands.update',$brand->id) }}">
        @csrf @method('PUT')

        <input type="text" name="name" value="{{ $brand->name }}"
               class="w-full mb-3 border p-2">

        {{-- Current Logo --}}
        <img src="{{ $brand->getFirstMediaUrl('logo') }}"
             class="h-12 mb-2">

        <input type="file" name="logo" class="mb-3">

        <button class="bg-green-600 text-white px-4 py-2">Update</button>
    </form>

</div>

@endsection