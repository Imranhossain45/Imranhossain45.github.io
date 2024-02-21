<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Desclaimer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function desclaimer_edit(Desclaimer $desclaimer)
    {
        return view('backend.desclaimer.edit', compact('desclaimer'));
    }
    public function desclaimer_update(Request $request, Desclaimer $desclaimer)
    {

        $request->validate([
            'content' => 'nullable',
        ]);

        $desclaimer->update([
            'content' => $request->content,
        ]);
        Toastr::success('Desclaimer info Updated','Success');
        return back();
    }
    public function dmca_edit(Desclaimer $desclaimer)
    {
        return view('backend.desclaimer.dmca_edit', compact('desclaimer'));
    }
    public function dmca_update(Request $request, Desclaimer $desclaimer)
    {     

        $desclaimer->update([
            'dmca_content' => $request->dmca_content,
        ]);
        Toastr::success('DMCA info Updated!','Success');
        return back();
    }
}
