<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $brand = Brand::create([
            'name' => $request->name
        ]);

        if ($request->hasFile('logo')) {
            $brand->addMediaFromRequest('logo')
                  ->toMediaCollection('logo');
        }

        return redirect()->route('admin.brands.index')
            ->with('message', 'Brand Added');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $brand->update([
            'name' => $request->name
        ]);

        if ($request->hasFile('logo')) {

            $brand->clearMediaCollection('logo');

            $brand->addMediaFromRequest('logo')
                  ->toMediaCollection('logo');
        }

        return redirect()->route('admin.brands.index')
            ->with('message', 'Updated');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back()->with('message', 'Deleted');
    }
}