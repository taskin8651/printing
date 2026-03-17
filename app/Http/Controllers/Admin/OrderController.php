<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ORDER LIST
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $orders = Order::with('items')->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    /*
    |--------------------------------------------------------------------------
    | ORDER DETAIL
    |--------------------------------------------------------------------------
    */
    public function show(Order $order)
    {
        $order->load('items.product');

        return view('admin.orders.show', compact('order'));
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS UPDATE
    |--------------------------------------------------------------------------
    */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('message', 'Status Updated');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE ORDER
    |--------------------------------------------------------------------------
    */
    public function destroy(Order $order)
    {
        $order->delete();

        return back()->with('message', 'Order Deleted');
    }
}