<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Brand;

class IndexController extends Controller
{
   public function index()
{
    $heros = Product::with('media')
        ->where('status', 1)
        ->latest()
        ->take(5) // slider ke liye 5 products
        ->get();

        $categories = Category::with('media')->latest()->take(6)->get();

        $products = Product::with('media')
    ->where('status', 1)
    ->latest()
    ->get();

     $featured = Product::where('is_featured', 1)->latest()->take(6)->get();

    $bestSeller = Product::where('is_best_seller', 1)->latest()->take(6)->get();

    $trending = Product::where('is_trending', 1)->latest()->take(6)->get();

    $testimonials = Testimonial::latest()->get(); // 🔥 ADD THIS

     $blogs = Blog::with('media')->latest()->take(3)->get(); // 🔥 ADD

       $brands = Brand::with('media')->get(); // 🔥 ADD

    return view('custom.index', compact('products', 'categories', 'featured', 'bestSeller', 'trending', 'heros', 'testimonials', 'blogs', 'brands')); // 🔥 PASS TESTIMONIALS AND BLOGS TO VIEW
}

}