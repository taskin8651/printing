@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-xl">

    <h2 class="mb-4 font-semibold">Add Testimonial</h2>

    <form method="POST" action="{{ route('admin.testimonials.store') }}">
        @csrf

        <input type="text" name="name" placeholder="Name"
               class="w-full mb-3 border p-2">

        <input type="text" name="designation" placeholder="Designation"
               class="w-full mb-3 border p-2">

        <textarea name="message" placeholder="Message"
                  class="w-full mb-3 border p-2"></textarea>

        <button class="bg-blue-600 text-white px-4 py-2">Save</button>
    </form>

</div>

@endsection