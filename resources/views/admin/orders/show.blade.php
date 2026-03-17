@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-6">

    <h2 class="text-xl font-semibold mb-4">Order Details</h2>

    {{-- CUSTOMER --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Customer Info</h3>

        <p><strong>Name:</strong> {{ $order->name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
    </div>

    {{-- ORDER --}}
    <div class="mb-6">
        <p><strong>Order No:</strong> {{ $order->order_number }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
    </div>

    {{-- ITEMS --}}
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2">Product</th>
                <th class="p-2">Qty</th>
                <th class="p-2">Price</th>
                <th class="p-2">Total</th>
            </tr>
        </thead>

        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td class="p-2">
                    {{ $item->product_name }}
                    <br>
                    <small>{{ $item->variant }}</small>
                </td>

                <td class="p-2">{{ $item->quantity }}</td>
                <td class="p-2">₹{{ $item->price }}</td>
                <td class="p-2">₹{{ $item->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- TOTAL --}}
    <div class="text-right mt-4">
        <h3 class="text-lg font-semibold">
            Total: ₹{{ $order->total_amount }}
        </h3>
    </div>

</div>

@endsection