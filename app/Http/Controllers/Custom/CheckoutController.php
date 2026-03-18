<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
     // 📦 Checkout Page
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty!');
        }

        return view('custom.shop.checkout', compact('cart'));
    }

    // 🧾 Place Order
   public function placeOrder(Request $request)
{
    // dd($request->all());
    $cart = session()->get('cart', []);
    // dd($cart);

    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Cart is empty!');
    }

    // ✅ Validation (FIXED)
    $request->validate([
        'user_first_name'  => 'required',
        'user_last_name'   => 'required',
        'user_check_email' => 'required|email',
        'user_address'     => 'required',
    ]);

    // ✅ Total (no multiply as per your logic)
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'];
    }

    // ✅ Create Order
    $order = Order::create([
        'order_number' => 'ORD-' . strtoupper(\Str::random(8)),

        'name'    => $request->user_first_name . ' ' . $request->user_last_name,
        'email'   => $request->user_check_email,
        'phone'   => $request->phone ?? '',
        'address' => $request->user_address,

        'total_amount' => $total,
        'status' => 'pending',
    ]);

    // ❌ REMOVE THIS (important)
    // dd($order);

    // ✅ Save Order Items
    foreach ($cart as $id => $item) {

        OrderItem::create([
            'order_id' => $order->id,

            'product_id' => $item['product_id'] ?? null,

            'product_name' => $item['name'],
            'sku' => null,

            'quantity' => $item['quantity'],
            'price' => $item['price'],
            'total' => $item['price'], // no multiply

            'variant' => json_encode($item['variants'] ?? []),

            'notes' => null,
        ]);
    }

    // ✅ Clear cart
    session()->forget('cart');

    return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
}
}
