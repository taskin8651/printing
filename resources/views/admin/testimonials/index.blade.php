@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Testimonials</h2>

        <a href="{{ route('admin.testimonials.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add
        </a>
    </div>

    <table class="w-full">
        <thead>
            <tr class="bg-gray-100">
                <th>Name</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($testimonials as $t)
            <tr>
                <td>{{ $t->name }}</td>
                <td>{{ $t->message }}</td>

                <td class="flex gap-2">
                    <a href="{{ route('admin.testimonials.edit',$t->id) }}"
                       class="bg-green-500 text-white px-2 py-1 rounded">Edit</a>

                    <form action="{{ route('admin.testimonials.destroy',$t->id) }}" method="POST">
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