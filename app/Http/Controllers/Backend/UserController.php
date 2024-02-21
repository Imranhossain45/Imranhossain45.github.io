<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
        ]);
        // $photo = $request->file('photo');
        // if ($photo) {          
        //     $folder = 'frame';
        //     $response = cloudUpload($photo, $folder, null);
        //     $photo = $response;
        // }
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);;
        Toastr::success('User Added!', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
        ]);


        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);
        Toastr::success('User info Edited!', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
    public function status(User $user)
    {
        if ($user->status == 'unblock') {
            $user->status = 'block';
            $user->save();
        } else {
            $user->status = 'unblock';
            $user->save();
        }
        Toastr::success($user->status == 'unblock' ? 'User Unblocked' : 'User Blocked', 'Success');
        return back();
    }

    public function permDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        Toastr::success('User Info Deleted', 'Success');
        return back();
    }

    public function profile()
    {
        return view('backend.admin.profile');
    }
}
