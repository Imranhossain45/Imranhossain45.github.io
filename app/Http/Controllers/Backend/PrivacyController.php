<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
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
    public function show(Privacy $privacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Privacy $privacy)
    {
        return view('backend.privacy_policy.edit',compact('privacy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Privacy $privacy)
    {
        $request->validate([
            'content' => 'nullable',
        ]);

        $privacy->update([
            'content' => $request->content,
        ]);

        return back()->with('success', 'Privacy Policy Info Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Privacy $privacy)
    {
        //
    }
}
