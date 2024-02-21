<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\SectionContent;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SectionContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = SectionContent::where('page_name', 'home_page')->where('status',1)->orderBy('id', 'asc')->paginate(10);
        $about = SectionContent::where('page_name', 'about_us')->where('status',1)->orderBy('id', 'asc')->paginate(10);
        $fund = SectionContent::where('page_name', 'fund')->where('status',1)->orderBy('id', 'asc')->paginate(10);
        $service = SectionContent::where('page_name', 'service')->where('status',1)->orderBy('id', 'asc')->paginate(10);
        $research = SectionContent::where('page_name', 'research')->where('status',1)->orderBy('id', 'asc')->paginate(10);
        $navsection_content = SectionContent::where('page_name', 'nav')->where('status',1)->orderBy('id', 'asc')->paginate(10);
        return view('backend.sectionContent.test', compact('home', 'about', 'fund', 'service', 'research', 'navsection_content'));
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
    public function show(SectionContent $sectionContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SectionContent $sectionContent)
    {
        return view('backend.sectionContent.edit', compact('sectionContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $sectionContent = SectionContent::where('id', $request->id)->first();
        $request->validate([
            'header' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg,svg|max:2000'
        ]);
        if ($request->has('photo')) {
            $folder = 'sectionContent';
            $response = cloudUpload($request->photo, $folder, $sectionContent->photo);
            $sectionContent->photo = $response;
        }
        SectionContent::where('id', $request->id)->update([
            'header' => $request->header,
            'sub_header' => $request->sub_header,
            'content' => $request->content,
            'photo' => $sectionContent->photo,
        ]);
        Toastr::success('Section Content Updated!', 'Success');
        return redirect(route('backend.sectionContent.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SectionContent $sectionContent)
    {
        //
    }
}
