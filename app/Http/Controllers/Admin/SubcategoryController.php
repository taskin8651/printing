<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->latest()->get();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $subcategory = Subcategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        if ($request->hasFile('image')) {
            $subcategory->addMediaFromRequest('image')
                        ->toMediaCollection('subcategory_image');
        }

        return redirect()->route('admin.subcategories.index');
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        if ($request->hasFile('image')) {
            $subcategory->clearMediaCollection('subcategory_image');

            $subcategory->addMediaFromRequest('image')
                        ->toMediaCollection('subcategory_image');
        }

        return redirect()->route('admin.subcategories.index');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return back();
    }
}