<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Meta;
use App\Models\News;
use App\Models\Magazine;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $topnews = News::where('status', 'publish')->where('top_news', 1)->orderBy('date', 'desc')->limit(5)->get();
        $trendingnews = News::where('status', 'publish')->orderBy('date', 'desc')->where('trending', 1)->limit(5)->get();
        $bdnews = News::where('status', 'publish')->orderBy('date', 'desc')->where('bangladesh', 1)->limit(5)->get();
        $wcnews = News::where('status', 'publish')->orderBy('date', 'desc')->where('bpl', 1)->limit(5)->get();
        $articles = Blog::where('status', 'publish')->orderBy('date', 'desc')->limit(6)->get();
        $photoGallery = PhotoGallery::where('status', 'publish')
            ->where('parent_id', null)->orderBy('id', 'desc')
            ->limit(6)
            ->get();
        $videoGallery = VideoGallery::where('status', 'publish')->orderBy('date', 'desc')
            ->limit(3)
            ->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'home')->first();
        $lnews = News::where('status', 'publish')->orderBy('date', 'desc')
            ->where('url', null)
            ->limit(10)
            ->get();


        $poplarnews_cric = News::with('visitors')
            ->where('status', 'publish')
            ->where('category_id', 1)
            ->has('visitors')
            ->limit(10)
            ->get()
            ->sortByDesc(function ($news) {
                return $news->visitors->sum('count');
            });





        $poplarnews_foot = News::with('visitors')
            ->where('status', 'publish')
            ->where('category_id', 2)
            ->has('visitors')
            ->limit(10)
            ->get()
            ->sortByDesc(function ($news) {
                return $news->visitors->sum('count');
            });
        $popularnews_other = News::with('visitors')
            ->where('status', 'publish')
            ->whereNotIn('category_id', [2, 1])
            ->has('visitors')
            ->limit(10)
            ->get()
            ->sortByDesc(function ($news) {
                return $news->visitors->sum('count');
            });










        /* return view('frontend.index', compact('metaData', 'lnews', 'topnews', 'trendingnews', 'bdnews', 'wcnews', 'articles', 'photoGallery', 'videoGallery', 'magazine', 'poplarnews_cric', 'poplarnews_foot', 'popularnews_other', 'cricket_team_test', 'cricket_team_odi', 'cricket_team_t', 'recent_series_int', 'recent_series_leg', 'recent_series_dom')); */





        /*  return view('frontend.index', compact(
            'metaData',
            'lnews',
            'topnews',
            'trendingnews',
            'bdnews',
            'wcnews',
            'articles',
            'photoGallery',
            'videoGallery',
            'magazine',
            'poplarnews_cric',
            'poplarnews_foot',
            'popularnews_other',
            'player_json_data'
        )); */

        return view('frontend.index', compact(
            'metaData',
            'lnews',
            'topnews',
            'trendingnews',
            'bdnews',
            'wcnews',
            'articles',
            'photoGallery',
            'videoGallery',
            'magazine',
            'poplarnews_cric',
            'poplarnews_foot',
            'popularnews_other',

        ));
    }

    public function authLogout_user()
    {
        Session::flush();

        Auth::logout();
        Toastr::success('Logout Successful');

        return redirect(route('index'));
    }

    public function search(Request $request)
    {
        if ($request->search != null) {
            $searchTerm = '%' . $request->search . '%';

            $table1Query = Blog::where('title', 'LIKE', $searchTerm)->get();
            $table2Query = News::where('title', 'LIKE', $searchTerm)->get();
            /*  $table3Query = Document::where('name', 'LIKE', $searchTerm)->get(); */

            return view('frontend.pages.ajaxsearchitem', compact('table1Query', 'table2Query'));
        }
    }

    public function api_test()
    {
        /* $APIkey = 'd6bc474b27fdeeb12664ff70cd0a7de9f61c702c3be38b2e842c89e61a5bb622';

        $curl_options = array(
            CURLOPT_URL => "https://apiv2.allsportsapi.com/cricket/?met=Livescore&APIkey=$APIkey",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 5
        );

        $curl = curl_init();
        curl_setopt_array($curl, $curl_options);
        $result = curl_exec($curl);

        $test_league_api = json_decode($result);

        $data = $test_league_api->result;

        print_r($data); */

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/img/v1/i1/c6642/i.jpg",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: cricbuzz-cricket.p.rapidapi.com",
                "X-RapidAPI-Key: 4ba62aa9f0msh74c431c91a1edbbp145ec8jsn36adae5493fa"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // Convert binary image data to base64
            $base64Image = base64_encode($response);

            // Embed the image in a data URI
            $dataUri = 'data:image/jpeg;base64,' . $base64Image;

            // Display the image using an HTML img tag
            echo '<img src="' . $dataUri . '" alt="Image">';
        }
    }

    public static function cricket_data_recent()
    {
    }
    public static function cricket_data_live()
    {
    }
    /* public static function cricket_data()
    {

        $APIkey = 'd6bc474b27fdeeb12664ff70cd0a7de9f61c702c3be38b2e842c89e61a5bb622';

        $curl_options = array(
            CURLOPT_URL => "https://apiv2.allsportsapi.com/cricket/?met=Livescore&APIkey=$APIkey",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 5
        );

        $curl = curl_init();
        curl_setopt_array($curl, $curl_options);
        $result = curl_exec($curl);

        $test_league_api = json_decode($result);

        if ($test_league_api) {
            $data = $test_league_api->result;
            return $data;
        } else {
            http_response_code(404);
            echo "404 Not Found";
            exit();
        }

    } */


    /*  public static function football_data()
    {
        $APIkey = '241e93281f895b0c4d150ef8ecb8c303ca6902d047ef33cda4f09cfa9396a37b';

        $curl_options = array(
            CURLOPT_URL => "https://apiv2.allsportsapi.com/football/?met=Livescore&APIkey=$APIkey",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 5
        );

        $curl = curl_init();
        curl_setopt_array($curl, $curl_options);
        $result = curl_exec($curl);

        $test_league_api = json_decode($result);
        $football_data = $test_league_api->result;

        return $football_data;
    } */
}
