<?php

namespace App\Http\Controllers\Backend;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeTeam = Team::where('status', 'publish')->whereNot('id',1)->paginate(10);
        $draftTeam = Team::where('status', 'draft')->paginate(10);
        $trashedTeam = Team::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        $teamid = Team::get();
        return view('backend.team.index', compact('activeTeam', 'draftTeam', 'trashedTeam','teamid'));
    }
    public function founder(){
        $teamid = Team::get();
        $founder = Team::where('status', 'publish')->where('id',1)->first();
        return view('backend.team.founder',compact('founder','teamid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg,webp|max:2000',
        ]);
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'team';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        Team::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'photo' => $photo,

        ]);
        Toastr::success('Team Info Added Successful!','Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp|max:2000',
        ]);

        if ($request->has('photo')) {
            $folder = 'team';
            $response = cloudUpload($request->photo, $folder, $team->photo);
            $team->photo = $response;
        }
        $team->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'photo' => $team->photo,

        ]);
        Toastr::success('Team Info Updated!', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->save();
        $team->delete();
        Toastr::success('Team Info Trashed!', 'Success');
        return back();
    }
    public function status(Team $team)
    {
        if ($team->status == 'publish') {
            $team->status = 'draft';
            $team->save();
        } else {
            $team->status = 'publish';
            $team->save();
        }
        Toastr::success($team->status == 'publish' ? 'Team info Published' : 'Team info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $team = Team::onlyTrashed()->find($id);
        $team->restore();
        Toastr::success('Team Info Restored!', 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $team = Team::onlyTrashed()->find($id);
        $team->forceDelete();
        Toastr::error('Team Info Deleted!', 'Success');
        return back();
    }
}
