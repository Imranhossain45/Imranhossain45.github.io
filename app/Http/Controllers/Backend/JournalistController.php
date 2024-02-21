<?php

namespace App\Http\Controllers\Backend;

use App\Models\Journalist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class JournalistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activejournalist = Journalist::where('status', 'publish')->paginate(10);
        $draftjournalist = Journalist::where('status', 'draft')->paginate(10);
        $trashedjournalist = Journalist::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.journalist.index', compact('activejournalist', 'draftjournalist', 'trashedjournalist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.journalist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp|max:2000',
        ]);
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'journalist';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
     
        Journalist::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linked_in' => $request->linked_in,
            'designation' => $request->designation,
            'description' => $request->description,
            'short_des' => $request->short_des, 
            'photo' => $photo,
            'alt_text' => $request->alt_text,

        ]);
        Toastr::success('Journalist Info Created', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Journalist $journalist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journalist $journalist)
    {
        return view('backend.journalist.edit',compact('journalist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Journalist $journalist)
    {
       
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp|max:2000',
        ]);
        if ($request->has('photo')) {
            $folder = 'journalist';
            $response = cloudUpload($request->photo, $folder, $journalist->photo);
            $journalist->photo = $response;
        }
     
        $journalist->update([
            
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'photo' => $journalist->photo,
            'alt_text' => $request->alt_text,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linked_in' => $request->linked_in,
            'designation' => $request->designation,
            'description' => $request->description,            
            'short_des' => $request->short_des,            

        ]);
        Toastr::success('Journalist Info Updated', 'Success');
        return redirect(route('backend.journalist.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journalist $journalist)
    {
        //
    }
}
