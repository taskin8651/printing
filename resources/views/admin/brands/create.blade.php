@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-xl">

    <h2 class="mb-4 font-semibold">Add Brand</h2>

    <form method="POST" enctype="multipart/form-data"
          action="{{ route('admin.brands.store') }}">
        @csrf

        <input type="text" name="name" placeholder="Brand Name"
               class="w-full mb-3 border p-2">

        <input type="file" name="logo" class="mb-3">

        <button class="bg-blue-600 text-white px-4 py-2">Save</button>
    </form>

</div>

@endsection