<?php

namespace App\Http\Controllers\Backend;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Journalist;
use Brian2694\Toastr\Facades\Toastr;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeNews = News::where('status', 'publish')->orderBy('id', 'desc')->paginate(10);
        $draftNews = News::where('status', 'draft')->orderBy('id', 'desc')->paginate(10);
        $trashedNews = News::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        $newsModaldata = News::get();
        return view('backend.news.index', compact('activeNews', 'draftNews', 'trashedNews', 'newsModaldata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $journalists =  Journalist::get();
        return view('backend.news.create', compact('categories', 'journalists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'photo' => 'required|mimes:png,jpg,jpeg,webp|max:2000',
        ]);
        $photo = $request->file('photo');
        $m_photo = $request->file('m_photo');
        if ($photo) {
            $folder = 'news';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($m_photo) {
            $folder = 'news';
            $response = cloudUpload($m_photo, $folder, null);
            $m_photo = $response;
        }
        News::create([
            'category_id' => $request->category_id,
            'journalist_id' => $request->journalist_id,
            'auther' => $request->auther,
            'title' => $request->title,
            'slug' => Str::slug($request->slug ? $request->slug : $request->title),
            'date' => $request->date,
            'top_news' => $request->top_news ? 1 : 0,
            'trending' => $request->trending ? 1 : 0,
            'bangladesh' => $request->bangladesh ? 1 : 0,
            'icc_wc' => $request->icc_wc ? 1 : 0,
            'ipl' => $request->ipl ? 1 : 0,
            'bpl' => $request->bpl ? 1 : 0,
            'cpl' => $request->cpl ? 1 : 0,
            'psl' => $request->psl ? 1 : 0,
            'bbl' => $request->bbl ? 1 : 0,
            'lpl' => $request->lpl ? 1 : 0,
            'uefa' => $request->uefa ? 1 : 0,
            'epl' => $request->epl ? 1 : 0,
            'la_liga' => $request->la_liga ? 1 : 0,
            'serie_a' => $request->serie_a ? 1 : 0,
            'b_liga' => $request->b_liga ? 1 : 0,
            'leg_1' => $request->leg_1 ? 1 : 0,
            'm_leg' => $request->m_leg ? 1 : 0,
            's_pro' => $request->s_pro ? 1 : 0,
            'description' => $request->description,
            'photo' => $photo,
            'url' => $request->url,
            'm_photo' => $m_photo,
            'alt_text' => $request->alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success('News Info Create Successful!', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::get();
        $journalists =  Journalist::get();
        return view('backend.news.edit', compact('news', 'categories', 'journalists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp|max:2000',
        ]);

        if ($request->has('photo')) {
            $folder = 'news';
            $response = cloudUpload($request->photo, $folder, $news->photo);
            $news->photo = $response;
        }
        if ($request->has('m_photo')) {
            $folder = 'news';
            $response = cloudUpload($request->m_photo, $folder, $news->m_photo);
            $news->m_photo = $response;
        }

        $news->update([
            'category_id' => $request->category_id,
            'journalist_id' => $request->journalist_id,
            'auther' => $request->auther,
            'title' => $request->title,
            'slug' => Str::slug($request->slug ? $request->slug : $request->title),
            'date' => $request->date,
            'top_news' => $request->top_news ?? 0,
            'trending' => $request->trending ?? 0,
            'bangladesh' => $request->bangladesh ?? 0,
            'icc_wc' => $request->icc_wc ?? 0,
            'ipl' => $request->ipl ?? 0,
            'bpl' => $request->bpl ?? 0,
            'cpl' => $request->cpl ?? 0,
            'psl' => $request->psl ?? 0,
            'bbl' => $request->bbl ?? 0,
            'lpl' => $request->lpl ?? 0,
            'uefa' => $request->uefa ?? 0,
            'epl' => $request->epl ?? 0,
            'la_liga' => $request->la_liga ?? 0,
            'serie_a' => $request->serie_a ?? 0,
            'b_liga' => $request->b_liga ?? 0,
            'leg_1' => $request->leg_1 ?? 0,
            'm_leg' => $request->m_leg ?? 0,
            's_pro' => $request->s_pro ?? 0,
            'url' => $request->url,
            'description' => $request->description,
            'alt_text' => $request->alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'photo' => $news->photo,
            'm_photo' => $news->m_photo,

        ]);
        Toastr::success('News Info Updated!', 'Success');
        return redirect(route('backend.news.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->status == 'draft';
        $news->save();
        $news->delete();
        return back()->with('success', 'news Item Trashed');
    }
    public function status(News $news)
    {
        if ($news->status == 'publish') {
            $news->status = 'draft';
            $news->save();
        } else {
            $news->status = 'publish';
            $news->save();
        }
        return back()->with('success', $news->status == 'publish' ? 'News info Published' : 'News info Drafted');
    }
    public function reStore($id)
    {
        $news = News::onlyTrashed()->find($id);
        $news->restore();
        return back()->with('success', 'News Info Restored');
    }
    public function permDelete($id)
    {
        $news = News::onlyTrashed()->find($id);
        $news->forceDelete();
        return back()->with('success', 'News Info Deleted');
    }
}
