<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class IndexController extends Controller
{
   public function index()
{
    $products = Product::with('media')
        ->where('status', 1)
        ->latest()
        ->take(5) // slider ke liye 5 products
        ->get();

        $categories = Category::with('media')->latest()->take(6)->get();

    return view('custom.index', compact('products', 'categories'));
}

}