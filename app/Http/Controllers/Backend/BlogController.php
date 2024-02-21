<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeBlogs = Blog::where('status', 'publish')->paginate(10);
        $draftBlogs = Blog::where('status', 'draft')->paginate(10);
        $trashedBlogs = Blog::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        $blogModaldata = Blog::get();
        return view('backend.blog.index', compact('activeBlogs', 'draftBlogs', 'trashedBlogs', 'blogModaldata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg,webp|max:2000',
        ]);
        $photo = $request->file('photo');
        $meta_photo = $request->file('meta_photo');
        if ($photo) {
            $folder = 'blog';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($meta_photo) {
            $folder = 'blog';
            $response = cloudUpload($meta_photo, $folder, null);
            $meta_photo = $response;
        }
        Blog::create([
            'auther' => $request->auther,
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'photo' => $photo,
            'meta_photo' => $meta_photo,
            'alt_text' => $request->alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success('Article Created', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp|max:2000',
        ]);

        if ($request->has('photo')) {
            $folder = 'blog';
            $response = cloudUpload($request->photo, $folder, $blog->photo);
            $blog->photo = $response;
        }
        if ($request->has('meta_photo')) {
            $folder = 'blog';
            $response = cloudUpload($request->meta_photo, $folder, $blog->meta_photo);
            $blog->meta_photo = $response;
        }

        $blog->update([
            'auther' => $request->auther,
            'title' => $request->title,
            'slug' => Str::slug($request->slug ?? $request->title),
            'date' => $request->date,
            'description' => $request->description,
            'alt_text' => $request->alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'photo' => $blog->photo,
            'meta_photo' => $blog->meta_photo,

        ]);

        Toastr::success('Article Info Edited!', 'Success');

        return redirect(route('backend.blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->status == 'draft';
        $blog->save();
        $blog->delete();
        Toastr::success('Blog Item Trashed', 'Success');
        return back();
    }
    public function status(Blog $blog)
    {
        if ($blog->status == 'publish') {
            $blog->status = 'draft';
            $blog->save();
        } else {
            $blog->status = 'publish';
            $blog->save();
        }
        Toastr::success($blog->status == 'publish' ? 'Blog info Published' : 'Blog info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $blog = Blog::onlyTrashed()->find($id);
        $blog->restore();
        Toastr::success('Blog Info Restored', 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $blog = Blog::onlyTrashed()->find($id);
        $blog->forceDelete();
        Toastr::error('Blog info Deleted', 'Success');
        return back();
    }
}
