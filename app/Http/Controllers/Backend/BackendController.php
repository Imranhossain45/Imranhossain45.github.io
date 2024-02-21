<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Models\News;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function admin()
    {     
        $news = News::all();
        $article = Blog::all();
        $video = VideoGallery::all();
        $photo = PhotoGallery::all();
        return view('backend.index',compact('news', 'article', 'video', 'photo'));
    }
  

    public function authLogout()
    {
        Session::flush();

        Auth::logout();
        Toastr::success('Logout Successful');

        return redirect(route('admin'));
    }
}
