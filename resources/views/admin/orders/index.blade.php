@extends('layouts.admin')

@section('content')

<div class="bg-white shadow rounded p-4">

    <h2 class="text-lg font-semibold mb-4">Orders</h2>

    <table class="w-full" id="orderTable">
        <thead>
            <tr class="bg-gray-100">
                <th>ID</th>
                <th>Order No</th>
                <th>Name</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->name }}</td>
                <td>₹{{ $order->total_amount }}</td>

                <td>
                    <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
                        @csrf
                        <select name="status" onchange="this.form.submit()"
                                class="border px-2 py-1 rounded">

                            <option value="pending" {{ $order->status=='pending'?'selected':'' }}>Pending</option>
                            <option value="processing" {{ $order->status=='processing'?'selected':'' }}>Processing</option>
                            <option value="shipped" {{ $order->status=='shipped'?'selected':'' }}>Shipped</option>
                            <option value="delivered" {{ $order->status=='delivered'?'selected':'' }}>Delivered</option>
                            <option value="cancelled" {{ $order->status=='cancelled'?'selected':'' }}>Cancelled</option>

                        </select>
                    </form>
                </td>

                <td>{{ $order->created_at->format('d M Y') }}</td>

                <td class="flex gap-2">

                    <a href="{{ route('admin.orders.show', $order->id) }}"
                       class="bg-blue-500 text-white px-3 py-1 rounded">
                        View
                    </a>

                    <form action="{{ route('admin.orders.destroy', $order->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 text-white px-3 py-1 rounded">
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
$('#orderTable').DataTable();
</script>
@endsection