<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'subcategory'])->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name . '-' . time()),

            'sku' => $request->sku ?? 'SKU-' . strtoupper(uniqid()),
            'stock' => $request->stock ?? 0,

            'price' => $request->price,
            'description' => $request->description,

            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,

            'status' => 1,
        ]);

        /*
        |--------------------------------------------------------------------------
        | MEDIA
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {
            $product->addMediaFromRequest('image')
                    ->toMediaCollection('product_image');
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $product->addMedia($file)
                        ->toMediaCollection('product_gallery');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | QUANTITY PRICING
        |--------------------------------------------------------------------------
        */

        if ($request->quantity) {
            foreach ($request->quantity as $key => $qty) {
                if ($qty && $request->price_list[$key]) {
                    $product->prices()->create([
                        'quantity' => $qty,
                        'price' => $request->price_list[$key],
                    ]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | VARIANTS
        |--------------------------------------------------------------------------
        */

        if ($request->variant_name) {
            foreach ($request->variant_name as $key => $name) {
                if ($name && $request->variant_value[$key]) {
                    $product->variants()->create([
                        'name' => $name,
                        'value' => $request->variant_value[$key],
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('message', 'Product Created');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $product->category_id)->get();

        return view('admin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name . '-' . time()),

            'sku' => $request->sku,
            'stock' => $request->stock,

            'price' => $request->price,
            'description' => $request->description,

            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        /*
        |--------------------------------------------------------------------------
        | MEDIA UPDATE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {
            $product->clearMediaCollection('product_image');

            $product->addMediaFromRequest('image')
                    ->toMediaCollection('product_image');
        }

        if ($request->hasFile('gallery')) {
            $product->clearMediaCollection('product_gallery');

            foreach ($request->file('gallery') as $file) {
                $product->addMedia($file)
                        ->toMediaCollection('product_gallery');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE PRICING
        |--------------------------------------------------------------------------
        */

        $product->prices()->delete();

        if ($request->quantity) {
            foreach ($request->quantity as $key => $qty) {
                if ($qty && $request->price_list[$key]) {
                    $product->prices()->create([
                        'quantity' => $qty,
                        'price' => $request->price_list[$key],
                    ]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE VARIANTS
        |--------------------------------------------------------------------------
        */

        $product->variants()->delete();

        if ($request->variant_name) {
            foreach ($request->variant_name as $key => $name) {
                if ($name && $request->variant_value[$key]) {
                    $product->variants()->create([
                        'name' => $name,
                        'value' => $request->variant_value[$key],
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('message', 'Product Updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('message', 'Deleted');
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function getSubcategories($id)
    {
        return response()->json(
            Subcategory::where('category_id', $id)->get()
        );
    }
}