@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-xl">

    <h2 class="mb-4 font-semibold">Edit Testimonial</h2>

    <form method="POST" action="{{ route('admin.testimonials.update',$testimonial->id) }}">
        @csrf @method('PUT')

        <input type="text" name="name" value="{{ $testimonial->name }}"
               class="w-full mb-3 border p-2">

        <input type="text" name="designation" value="{{ $testimonial->designation }}"
               class="w-full mb-3 border p-2">

        <textarea name="message"
                  class="w-full mb-3 border p-2">{{ $testimonial->message }}</textarea>

        <button class="bg-green-600 text-white px-4 py-2">Update</button>
    </form>

</div>

@endsection