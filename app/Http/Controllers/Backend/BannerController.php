<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activeBanner = Banner::where('status', 'publish')->paginate(10);
        $draftBanners = Banner::where('status', 'draft')->paginate(10);
        $trashedBanners = Banner::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.banner.index', compact('activeBanner', 'draftBanners', 'trashedBanners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $photo = $request->file('photo');
        $video = $request->file('video');

        // if ($photo) {
        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/blog/' . $photoName));
        // }
        if ($photo) {
            $folder = 'banner';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($video) {
            $folder = 'banner';
            $response = cloudUpload($video, $folder, null);
            $video = $response;
        }

        Banner::create([

            'title' => $request->title,
            'url1' => $request->url1,
            'url2' => $request->url2,
            'url3' => $request->url3,
            'photo' => $photo,
            'video' => $video,
            'type' => $request->type,
            'alt_text' => $request->alt_text,

        ]);
        Toastr::success('Banner Added Successfully', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $banner = Banner::where('id', $request->id)->first();


        if ($request->has('photo')) {
            $folder = 'banner';
            $response = cloudUpload($request->photo, $folder, $banner->photo);
            $banner->photo = $response;
        }
        if ($request->has('video')) {
            $folder = 'banner';
            $response = cloudUpload($request->video, $folder, $banner->video);
            $banner->video = $response;
        }
        Banner::where('id', $request->id)->update([
            'title' => $request->title,
            'url1' => $request->url1,
            'url2' => $request->url2,
            'url3' => $request->url3,
            'photo' => $banner->photo,
            'photo' => $banner->video,
            'alt_text' => $request->alt_text,
        ]);

        Toastr::success('Banner Update Successful!', 'Success');
        return redirect(route('backend.banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
        $banner->status == 'draft';
        $banner->save();
        $banner->delete();
        Toastr::success('Banner Item Trashed!', 'Success');
        return back()->with('success', 'Banner Item Trashed');
    }
    public function status(Banner $banner)
    {
        if ($banner->status == 'publish') {
            $banner->status = 'draft';
            $banner->save();
        } else {
            $banner->status = 'publish';
            $banner->save();
        }
        Toastr::success($banner->status == 'publish' ? 'Banner info Published' : 'Banner info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $banner = Banner::onlyTrashed()->find($id);
        $banner->restore();
        Toastr::success('Banner Info Restored!', 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $banner = Banner::onlyTrashed()->find($id);
        $banner->forceDelete();
        Toastr::error('Banner Info Deleted!', 'Success');
        return back();
    }
}
