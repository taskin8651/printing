<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title . '-' . time()),
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        // 🔥 Image upload
        if ($request->hasFile('image')) {
            $blog->addMediaFromRequest('image')
                 ->toMediaCollection('blog_image');
        }

        return redirect()->route('admin.blogs.index')
            ->with('message', 'Blog Created');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title . '-' . time()),
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        // 🔥 update image
        if ($request->hasFile('image')) {
            $blog->clearMediaCollection('blog_image');

            $blog->addMediaFromRequest('image')
                 ->toMediaCollection('blog_image');
        }

        return redirect()->route('admin.blogs.index')
            ->with('message', 'Updated');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('message', 'Deleted');
    }
}