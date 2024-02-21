<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeFback = Testimonial::where('status', 'publish')->paginate(10);
        $draftFback = Testimonial::where('status', 'draft')->paginate(10);
        $trashedFback = Testimonial::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.testimonial.index', compact('activeFback', 'draftFback', 'trashedFback'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg,svg,webp|max:2000',
        ]);
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'Testimonial';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        Testimonial::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description,
            'url' => $request->url,
            'photo' => $photo,

        ]);
        Toastr::success('Testimonial Info Added Successful!', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp|max:2000',
        ]);

        if ($request->has('photo')) {
            $folder = 'testimonial';
            $response = cloudUpload($request->photo, $folder, $testimonial->photo);
            $testimonial->photo = $response;
        }
        $testimonial->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description,
            'url' => $request->url,
            'photo' => $testimonial->photo,

        ]);
        Toastr::success('Testimonial Info Edited!', 'Success');
        return redirect(route('backend.testimonial.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->save();
        $testimonial->delete();
        Toastr::success('testimonial Info Trashed', 'Success');
        return back();
    }
    public function status(Testimonial $testimonial)
    {
        if ($testimonial->status == 'publish') {
            $testimonial->status = 'draft';
            $testimonial->save();
        } else {
            $testimonial->status = 'publish';
            $testimonial->save();
        }
        Toastr::success($testimonial->status == 'publish' ? 'Testimonial info Published' : 'Testimonial info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $testimonial = Testimonial::onlyTrashed()->find($id);
        $testimonial->restore();
        Toastr::success('Testimonial Info Restored', 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $testimonial = Testimonial::onlyTrashed()->find($id);
        $testimonial->forceDelete();
        Toastr::error('Testimonial Info Deleted', 'Success');
        return back();
    }
}
