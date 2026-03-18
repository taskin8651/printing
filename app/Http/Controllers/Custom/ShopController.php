<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopController extends Controller
{
     // 🟢 Category Page
  public function category(Request $request, $slug)
    {
        // 🔥 Get category with relations
        $category = Category::where('slug', $slug)
            ->with(['subcategories.products.media'])
            ->firstOrFail();

        // 🔥 Collect all products from subcategories
        $allProducts = collect();

        foreach ($category->subcategories as $sub) {
            $products = $sub->products()
                ->where('status', 1)
                ->get();

            $allProducts = $allProducts->merge($products);
        }

        // 🔥 Remove duplicates (important)
        $allProducts = $allProducts->unique('id')->values();

        // 🔥 Pagination settings
        $perPage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $pagedData = $allProducts->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $products = new LengthAwarePaginator(
            $pagedData,
            $allProducts->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        // 🔥 Send to view
        return view('custom.shop.categories', compact('category', 'products'));
    }

     public function index(Request $request, $slug)
    {
        // 🔥 Get subcategory with category
        $subcategory = Subcategory::where('slug', $slug)
            ->with('category')
            ->firstOrFail();

        // 🔥 Products query
        $products = $subcategory->products()
            ->with('media')
            ->where('status', 1);

        // 🔥 Sorting (optional)
        if ($request->sort == 'low') {
            $products->orderBy('price', 'asc');
        } elseif ($request->sort == 'high') {
            $products->orderBy('price', 'desc');
        } else {
            $products->latest();
        }

        // 🔥 Pagination
        $products = $products->paginate(12);

        return view('custom.shop.shop', compact('subcategory', 'products'));
    }

    // 🟢 Subcategory Products
    public function products($subcategorySlug)
{
    // slug se find karo
    $subcategory = Subcategory::where('slug', $subcategorySlug)->firstOrFail();

    // products fetch karo using ID
    $products = \App\Models\Product::where('subcategory_id', $subcategory->id)
                    ->latest()
                    ->paginate(9);

    return view('custom.shop.products', compact('subcategory', 'products'));
}

public function show($slug)
{
    $product = Product::with(['category', 'subcategory', 'media', 'prices', 'variants'])
        ->where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();

    // 🔥 Related products (same subcategory)
    $relatedProducts = Product::where('subcategory_id', $product->subcategory_id)
        ->where('id', '!=', $product->id)
        ->where('status', 1)
        ->take(8)
        ->get();

    return view('custom.shop.product-details', compact('product', 'relatedProducts'));
}
}
