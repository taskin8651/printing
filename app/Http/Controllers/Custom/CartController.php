<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // 🛒 Add to cart
    public function add(Request $request)
{
    // dd($request->all());
    $product = Product::findOrFail($request->product_id);

    $cart = session()->get('cart', []);

    $id = $product->id . '-' . md5(json_encode($request->variants));

    $cart[$id] = [
        "product_id" => $product->id,
        "name" => $product->name,
        "price" => $request->price,
        "quantity" => $request->quantity,
        "image" => $product->getFirstMediaUrl('product_image'),
        "variants" => $request->variants ?? [],
    ];
    session()->put('cart', $cart);

    return redirect()->route('cart.index');
}

    // 📦 Cart page
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('custom.shop.cart', compact('cart'));
    }

    // ❌ Remove item
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return view('custom.shop.cart', compact('cart'))->with('success', 'Product removed from cart!');
    }

    // 🔄 Update quantity
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->quantities as $id => $qty) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $qty;
            }
        }

        session()->put('cart', $cart);

        return back();
    }
}
