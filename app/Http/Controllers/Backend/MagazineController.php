<?php

namespace App\Http\Controllers\Backend;

use App\Models\Magazine;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FileApiController;
use Brian2694\Toastr\Facades\Toastr;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magazines = Magazine::paginate(10);
        return view('backend.magazine.index', compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.magazine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo1' => 'nullable|mimes:png,jpg,jpeg,gif,webp|max:5000',
            'photo2' => 'nullable|mimes:png,jpg,jpeg,gif,webp|max:5000',
            'photo3' => 'nullable|mimes:png,jpg,jpeg,gif,webp|max:5000',
        ]);
        $photo1 = $request->file('photo1');
        $photo2 = $request->file('photo2');
        $photo3 = $request->file('photo3');
        if ($photo1) {
            $folder = 'magazine';
            $response = cloudUpload($photo1, $folder, null);
            $photo1 = $response;
        }
        if ($photo2) {
            $folder = 'magazine';
            $response = cloudUpload($photo2, $folder, null);
            $photo2 = $response;
        }
        if ($photo3) {
            $folder = 'magazine';
            $response = cloudUpload($photo3, $folder, null);
            $photo3 = $response;
        }
        Magazine::create([
            'name' => $request->name,
            'photo1' => $photo1,
            'photo2' => $photo2,
            'photo3' => $photo3,
            'url1' => $request->url1,
            'url2' => $request->url2,
            'url3' => $request->url3,
            'url4' => $request->url4,

        ]);
        Toastr::success('Magazine/Add Created', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Magazine $magazine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Magazine $magazine)
    {
        return view('backend.magazine.edit', compact('magazine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Magazine $magazine)
    {
        $request->validate([
            'photo1' => 'nullable|mimes:png,jpg,jpeg,gif,webp|max:5000',
            'photo2' => 'nullable|mimes:png,jpg,jpeg,gif,webp|max:5000',
            'photo3' => 'nullable|mimes:png,jpg,jpeg,gif,webp|max:5000',
        ]);
         if ($request->has('photo1')) {
            $folder = 'magazine';
            $response = cloudUpload($request->photo1, $folder, $magazine->photo1);
            $magazine->photo1 = $response;
        }
        if ($request->has('photo2')) {
            $folder = 'magazine';
            $response = cloudUpload($request->photo2, $folder, $magazine->photo2);
            $magazine->photo2 = $response;
        }
        if ($request->has('photo3')) {
            $folder = 'magazine';
            $response = cloudUpload($request->photo3, $folder, $magazine->photo3);
            $magazine->photo3 = $response;
        }


      /*   if ($request->hasfile('photo2')) {
            $file         = $request->file('photo2');
            $extension    = $file->extension();
            $pro_pic      = 'pro-pic-' . date('Ymd') . Str::random(20) . date('His') . '.' . $extension;
            $directory    = public_path('storage/uploads/');
            $file->move($directory, $pro_pic);

            $fileApi = FileApiController::uploadfile($directory . $pro_pic);

            if ($fileApi == 1) {
                @unlink(public_path('storage/uploads/' . $pro_pic));
            }

            if ($user->pro_pic) {
                FileApiController::remove_file($user->pro_pic);
            }
        } */

        $magazine->update([
            'name' => $request->name,
            'photo1' => $magazine->photo1 ?? null,
            'photo2' =>  $magazine->photo2 ?? null,
            'photo3' => $magazine->photo3 ?? null,
            'url1' => $request->url1,
            'url2' => $request->url2,
            'url3' => $request->url3,
            'url4' => $request->url4,

        ]);
        Toastr::success('Magazine/Add Updated', 'Success');
        return redirect(route('backend.magazine.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Magazine $magazine)
    {
        $magazine->delete();
        Toastr::error('Magazine Info Deleted!', 'Success');
        return back();
    }
}
