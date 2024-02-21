<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeCategory = Category::where('status', 'publish')->paginate(10);
        $draftCategory = Category::where('status', 'draft')->paginate(10);
        $trashedCategory = Category::onlyTrashed()->orderBy('id', 'desc')->paginate(10);

        $childCategories = Category::where('parent_id', null)->get();
        return view('backend.category.index', compact('activeCategory', 'draftCategory', 'trashedCategory', 'childCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        return view('backend.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $meta_photo = $request->file('m_photo');
        $request->validate([
            'name' => 'nullable|unique:categories,name',
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp|max:2000',
        ]);
        // if ($photo) {
        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/category/' . $photoName));
        // }

        if ($photo) {
            $folder = 'category';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }

        if ($meta_photo) {
            $folder = 'category';
            $response = cloudUpload($meta_photo, $folder, null);
            $meta_photo = $response;
        }
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'alt_text' => $request->alt_text,
            'parent_id' => $request->parent_id,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'photo' => $photo,
            'm_photo' => $meta_photo,
        ]);
        Toastr::success('Category Added Successful!', 'Success');
        return redirect(route('backend.category.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
       
        $categories = Category::get();
        return view('backend.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp|max:2000',
        ]);;
        if ($request->has('photo')) {
            $folder = 'category';
            $response = cloudUpload($request->photo, $folder, $category->photo);
            $category->photo = $response;
        }
        if ($request->has('m_photo')) {
            $folder = 'blog';
            $response = cloudUpload($request->meta_photo, $folder, $category->m_photo);
            $category->m_photo = $response;
        }
        $category->update([
            'slug' => Str::slug($request->slug ?? $request->name),
            'name' => $request->name,
            'description' => $request->description,
            'alt_text' => $request->alt_text,
            'parent_id' => $request->parent_id,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'photo' => $category->photo,
            'm_photo' => $category->m_photo,
        ]);

        Toastr::success('Category Info Updated', 'Success');
        return redirect(route('backend.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->status == 'draft';
        $category->save();
        $category->delete();
        return back()->with('success', 'Category Item Trashed');
    }
    public function status(Category $category)
    {
        if ($category->status == 'publish') {
            $category->status = 'draft';
            $category->save();
        } else {
            $category->status = 'publish';
            $category->save();
        }
        Toastr::success($category->status == 'publish' ? 'Category info Published' : 'Category info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->restore();
        return back();
    }
    public function permDelete($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->forceDelete();

        Toastr::error('Category info Deleted', 'Success');
        return back();
    }
}
