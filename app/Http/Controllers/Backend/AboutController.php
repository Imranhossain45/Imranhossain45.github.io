<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(About $about)
    {
        $about = About::first();
        return view('backend.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('backend.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {


        if ($request->has('photo')) {
            $folder = 'about';
            $response = cloudUpload($request->photo, $folder, $about->photo);
            $about->photo = $response;
        }
        if ($request->has('thumb_photo')) {
            $folder = 'about';
            $response = cloudUpload($request->thumb_photo, $folder, $about->thumb_photo);
            $about->thumb_photo = $response;
        }


        $about->update([
            'photo' => $about->photo,
            'thumb_photo' => $about->thumb_photo,
            'alt_txt' => $request->alt_text,
            'description' => $request->description,
            'url' => $request->url,
        ]);
        Toastr::success('About Info Updated Successfully', 'Success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
