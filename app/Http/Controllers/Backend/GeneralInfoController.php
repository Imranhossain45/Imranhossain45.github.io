<?php

namespace App\Http\Controllers\Backend;

use App\Models\GeneralInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class GeneralInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(GeneralInfo $generalInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralInfo $generalInfo)
    {
        return view('backend.generalInfo.edit', compact('generalInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeneralInfo $generalInfo)
    {
        $request->validate([
            'site_name' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
            'favicon_logo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
            'footer_logo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
            'bradcrum_photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
            'facebook' => 'nullable',
            'linkedin' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
            'address' => 'nullable',
            'copyright_text' => 'nullable',
        ]);

        if ($request->has('logo')) {          
            $folder = 'general_info';
            $response = cloudUpload($request->logo, $folder, $generalInfo->logo);
            $generalInfo->logo = $response;
        }
        if ($request->has('favicon_logo')) {          
            $folder = 'general_info';
            $response = cloudUpload($request->favicon_logo, $folder, $generalInfo->favicon_logo);
            $generalInfo->favicon_logo = $response;
        }
        if ($request->has('footer_logo')) {          
            $folder = 'general_info';
            $response = cloudUpload($request->footer_logo, $folder, $generalInfo->footer_logo);
            $generalInfo->footer_logo = $response;
        }
        if ($request->has('bradcrum_photo')) {          
            $folder = 'general_info';
            $response = cloudUpload($request->bradcrum_photo, $folder, $generalInfo->bradcrum_photo);
            $generalInfo->bradcrum_photo = $response;
        }
        if ($request->has('subscriber_photo')) {          
            $folder = 'general_info';
            $response = cloudUpload($request->subscriber_photo, $folder, $generalInfo->subscriber_photo);
            $generalInfo->subscriber_photo = $response;
        }
        if ($request->has('event_photo')) {
            $folder = 'general_info';
            $response = cloudUpload($request->event_photo, $folder, $generalInfo->event_photo);
            $generalInfo->event_photo = $response;
        }
        $remove = $request->hiddeen_event_photo;

        $array = [
            'site_name' => $request->site_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'logo' => $generalInfo->logo,
            'favicon_logo' => $generalInfo->favicon_logo,
            'footer_logo' => $generalInfo->footer_logo,
            'bradcrum_photo' => $generalInfo->bradcrum_photo,
            'subscriber_photo' => $generalInfo->subscriber_photo,
            'footer_des' => $request->footer_des,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'tiktok' => $request->tiktok,
            'youtube' => $request->youtube,
            'address' => $request->address,
            'copyright_text' => $request->copyright_text,
            'google_tag' => $request->google_tag,
            'facebook_pixel' => $request->facebook_pixel,
            'facebook_messenger' => $request->facebook_messenger,
            'bullet_text' => $request->bullet_text,
            'bullet_content' => $request->bullet_content,

        ];
        if ($remove) {
            $array['event_photo'] = null;
        } else {
            $array['event_photo'] = $generalInfo->event_photo;
        }

        $generalInfo->update($array);
        Toastr::success('General info updated!', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralInfo $generalInfo)
    {
        //
    }
}
