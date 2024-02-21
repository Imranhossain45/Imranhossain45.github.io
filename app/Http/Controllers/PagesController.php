<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Meta;
use App\Models\News;
use App\Models\Team;
use App\Models\About;
use App\Models\Terms;
use App\Models\Privacy;
use App\Models\Product;
use App\Models\Visitor;
use App\Models\Category;
use App\Models\Magazine;
use App\Models\OurStory;
use App\Models\SaleInfo;
use App\Models\Attribute;
use App\Models\CoreValue;
use App\Models\FlashDeal;
use App\Models\Inventory;
use App\Models\Desclaimer;
use App\Models\Journalist;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use App\Models\PhotoGallery;
use App\Models\ReturnPolicy;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\SectionContent;
use App\Models\ShippingPolicy;
use App\Models\InventoryFlashDeal;
use App\Models\PlayerData;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function all_article()
    {
        $articles = Blog::where('status', 'publish')->paginate(20);
        $metaData = Meta::where('page_name', 'all_article')->first();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(3)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.all_article', compact('articles', 'metaData', 'videoGallery', 'magazine'));
    }
    public function blog_details($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $latest_news = News::where('status', 'publish')->orderBy('created_at', 'desc')->limit(5)->get();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $photoGallery = PhotoGallery::where('status', 'publish')->where('parent_id', null)->limit(6)->get();
        $magazine = Magazine::first();
        $related_blog = Blog::where('id', '!=', $blog->id)
            ->orderBy('id', 'desc')
            ->inRandomOrder()
            ->limit(3)->get();

        $metaData = Blog::where('slug', $slug)->first();
        return view('frontend.pages.article_details', compact('blog', 'related_blog', 'latest_news', 'videoGallery', 'magazine', 'photoGallery', 'metaData'));
    }
    public function all_news()
    {
        $newses = News::where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(3)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'all_news')->first();
        return view('frontend.pages.all_news', compact('newses', 'metaData', 'videoGallery', 'magazine'));
    }
    public function news_details($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $latest_news = News::where('status', 'publish')->orderBy('created_at', 'desc')->limit(5)->get();
        $related_news = News::where('id', '!=', $news->id)->where('status', 'publish')->orderBy('id', 'desc')->inRandomOrder()->limit(10)->get();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $photoGallery = PhotoGallery::where('status', 'publish')->where('parent_id', null)->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = News::where('slug', $slug)->first();


        $json = @file_get_contents('http://ip-api.com/json/');
        $data = json_decode($json, JSON_PRETTY_PRINT);

        if ($json) {
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $existingVisitor = Visitor::where('news_id', $news->id)->first();

            if ($existingVisitor) {
                // If visitor record exists for this news_id and IP address, update count
                $existingVisitor->count += 1;
                $existingVisitor->save();
            } else {
                // If no visitor record exists, create a new one
                $visitor = new Visitor();
                $visitor->visitor_id = 'visitor-' . date('Ymd') . Str::random(20) . date('His');
                $visitor->data = $json;
                $visitor->ip_address = $ip_address;
                $visitor->news_id = $news->id;
                $visitor->count = 1; // Initial count for a new record
                $visitor->save();
            }
        }

        return view('frontend.pages.news_details', compact('news', 'latest_news', 'related_news', 'metaData', 'videoGallery', 'photoGallery', 'magazine'));
    }

    public function category($slug)
    {
        $category_slug = Category::where('slug', $slug)->firstOrFail();

        $newses = News::where('category_id', $category_slug->id)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $catgeories = Category::where('parent_id', null)->where('slug', $category_slug->slug)->get();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();


        /* if ($products->isEmpty()) {
            return view("frontend.pages.notFound",  compact('products', 'inventories', 'metaData', 'catgeories', 'flashDeal', 'category_slug'));
        } else {
            return view('frontend.pages.category', compact('products', 'inventories', 'metaData', 'catgeories', 'flashDeal', 'category_slug'));
        } */
        $metaData = Category::where('slug', $slug)->firstOrFail();

        return view('frontend.pages.all_news', compact('metaData', 'newses', 'category_slug', 'videoGallery', 'magazine'));
    }
    public function journalist($slug)
    {
        $journalist = Journalist::where('slug', $slug)->firstOrFail();

        $newses = News::where('journalist_id', $journalist->id)->where('status', 'publish')->orderBy('id', 'desc')->paginate(21);

        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        return view('frontend.pages.journalist_news', compact('newses', 'videoGallery', 'magazine', 'journalist'));
    }
    public function journalist_profile($slug)
    {
        $journalist = Journalist::where('slug', $slug)->firstOrFail();
        $lnews = News::where('journalist_id', $journalist->id)->where('status', 'publish')->orderBy('id', 'desc')->limit(5)->get();
        return view('frontend.pages.journalist_profile', compact('journalist', 'lnews'));
    }
     public function cricket_player_profile($id,$slug)
    {
       
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $lnews = News::where('status', 'publish')->orderBy('id', 'desc')->limit(5)->get();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/player/$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: cricbuzz-cricket.p.rapidapi.com",
                "X-RapidAPI-Key: 1e3f0b6f53msh75a696b9ef32303p123267jsnfd470919bc8f"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl); 
        curl_close($curl);
        $player_info = json_decode($response);

        return view('frontend.pages.player.cricket_profile', compact('videoGallery', 'magazine', 'lnews', 'player_info','id'));
    } 
    public function football_player_profile()
    {
        /* $journalist = Journalist::where('slug', $slug)->firstOrFail();
        $lnews = News::where('journalist_id', $journalist->id)->where('status', 'publish')->orderBy('id', 'desc')->limit(5)->get(); */
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $lnews = News::where('status', 'publish')->orderBy('id', 'desc')->limit(5)->get();
        return view('frontend.pages.player.football_player', compact('videoGallery', 'magazine', 'lnews'));
    }


    public function icc_cricket_world_cup()
    {
        $newses = News::where('icc_wc', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'all_news')->first();
        return view('frontend.pages.all_news', compact('metaData', 'newses', 'videoGallery', 'magazine'));
    }
    public function ipl()
    {
        $newses = News::where('ipl', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'all_news')->first();
        return view('frontend.pages.all_news', compact('metaData', 'newses', 'videoGallery', 'magazine'));
    }
    public function bpl()
    {
        $newses = News::where('bpl', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'all_news')->first();
        return view('frontend.pages.all_news', compact('metaData', 'newses', 'videoGallery', 'magazine'));
    }
    public function psl()
    {
        $newses = News::where('psl', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'all_news')->first();
        return view('frontend.pages.all_news', compact('metaData', 'newses', 'videoGallery', 'magazine'));
    }
    public function bbl()
    {
        $newses = News::where('bbl', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'all_news')->first();
        return view('frontend.pages.all_news', compact('metaData', 'newses', 'videoGallery', 'magazine'));
    }
    public function cpl()
    {
        $newses = News::where('cpl', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'all_news')->first();
        return view('frontend.pages.all_news', compact('metaData', 'newses', 'videoGallery', 'magazine'));
    }
    public function lpl()
    {
        $newses = News::where('lpl', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'all_news')->first();
        return view('frontend.pages.all_news', compact('metaData', 'newses', 'videoGallery', 'magazine'));
    }
    public function uefa()
    {
        $newses = News::where('uefa', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'all_news')->first();
        return view('frontend.pages.all_news', compact('newses', 'videoGallery', 'magazine', 'metaData'));
    }
    public function epl()
    {
        $newses = News::where('epl', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.all_news', compact('newses', 'videoGallery', 'magazine'));
    }
    public function la_liga()
    {
        $newses = News::where('la_liga', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.all_news', compact('newses', 'videoGallery', 'magazine'));
    }
    public function serie_a()
    {
        $newses = News::where('serie_a', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.all_news', compact('newses', 'videoGallery', 'magazine'));
    }
    public function b_liga()
    {
        $newses = News::where('b_liga', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.all_news', compact('newses', 'videoGallery', 'magazine'));
    }
    public function leg_1()
    {
        $newses = News::where('b_liga', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.all_news', compact('newses', 'videoGallery', 'magazine'));
    }
    public function m_leg()
    {
        $newses = News::where('m_leg', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.all_news', compact('newses', 'videoGallery', 'magazine'));
    }
    public function s_pro()
    {
        $newses = News::where('s_pro', 1)->where('status', 'publish')->orderBy('date', 'desc')->paginate(21);
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.all_news', compact('newses', 'videoGallery', 'magazine'));
    }


    public function about_us()
    {
        $about = About::firstorFail();
        $founder = Team::where('id', 1)->first();
        $members = Team::where('id', '!=', 1)->where('status', 'publish')->get();
        $testimonials = Testimonial::where('status', 'publish')->get();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'about_us')->first();
        return view('frontend.pages.about_us', compact('metaData', 'videoGallery',  'magazine', 'founder', 'members', 'about', 'testimonials'));
    }


    public function contact_us()
    {
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $metaData = Meta::where('page_name', 'contact_us')->first();
        return view('frontend.pages.contact_us', compact('metaData', 'videoGallery', 'magazine'));
    }

    /* icc ranking start */


    public function icc_ranking()
    {
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first(); 
        /* $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/batsmen?formatType=test",
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

        $batter_rank_test = json_decode($response);
        $batter_rank_test = array_slice($batter_rank_test->rank, 0, 6); */

        return view('frontend.pages.ranking.icc_ranking', compact('videoGallery', 'magazine'));
    }
    /*  public function icc_ranking_test()
    {
        $rankingType = "TEST";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/teams?formatType=test",
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



        $cricket_team_rank = json_decode($response);

        return view('frontend.pages.ranking.icc_team_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'cricket_team_rank'));
    }
     public function icc_ranking_odi()
    {
        $rankingType = "ODI";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/teams?formatType=odi",
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

        $cricket_team_rank = json_decode($response);

        return view('frontend.pages.ranking.icc_team_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'cricket_team_rank'));
    }
    public function icc_ranking_t20()
    {
        $rankingType = "T20";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/teams?formatType=t20",
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

        $cricket_team_rank = json_decode($response);
        return view('frontend.pages.ranking.icc_team_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'cricket_team_rank'));
    }
    public function icc_batter_ranking_test()
    {
        $rankingType = "TESTBat";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/batsmen?formatType=test",
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

        $batter_rank_test = json_decode($response);
        $icc_player_rank = $batter_rank_test->rank;
        return view('frontend.pages.ranking.icc_player_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'icc_player_rank'));
    }
    public function icc_batter_ranking_odi()
    {
        $rankingType = "ODIBat";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/batsmen?formatType=odi",
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

        $batter_rank_odi = json_decode($response);
        $icc_player_rank = $batter_rank_odi->rank;
        return view('frontend.pages.ranking.icc_player_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'icc_player_rank'));
    }
    public function icc_batter_ranking_t20()
    {
        $rankingType = "T20Bat";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/batsmen?formatType=t20",
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

        $batter_rank_T = json_decode($response);
        $icc_player_rank = $batter_rank_T->rank;
        return view('frontend.pages.ranking.icc_player_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'icc_player_rank'));
    }
    public function icc_bowler_ranking_test()
    {
        $rankingType = "TESTBowl";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/bowlers?formatType=test",
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

        $bowler_rank_test = json_decode($response);
        $icc_player_rank = $bowler_rank_test->rank;
        return view('frontend.pages.ranking.icc_player_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'icc_player_rank'));
    }
    public function icc_bowler_ranking_odi()
    {
        $rankingType = "ODIBowl";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/bowlers?formatType=odi",
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

        $bowler_rank_odi = json_decode($response);
        $icc_player_rank = $bowler_rank_odi->rank;
        return view('frontend.pages.ranking.icc_player_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'icc_player_rank'));
    }
    public function icc_bowler_ranking_t20()
    {
        $rankingType = "T20Bowl";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/bowlers?formatType=t20",
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

        $bowler_rank_T = json_decode($response);
        $icc_player_rank = $bowler_rank_T->rank;
        return view('frontend.pages.ranking.icc_player_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'icc_player_rank'));
    }
    public function icc_ar_ranking_test()
    {
        $rankingType = "TESTAR";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/allrounders?formatType=test",
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

        $bowler_rank_test = json_decode($response);
        $icc_player_rank = $bowler_rank_test->rank;
        return view('frontend.pages.ranking.icc_player_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'icc_player_rank'));
    }
    public function icc_ar_ranking_odi()
    {
        $rankingType = "ODIAR";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/allrounders?formatType=odi",
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

        $bowler_rank_odi = json_decode($response);
        $icc_player_rank = $bowler_rank_odi->rank;
        return view('frontend.pages.ranking.icc_player_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'icc_player_rank'));
    }
    public function icc_ar_ranking_t20()
    {
        $rankingType = "T20AR";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/rankings/allrounders?formatType=t20",
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

        $bowler_rank_T = json_decode($response);
        $icc_player_rank = $bowler_rank_T->rank;
        return view('frontend.pages.ranking.icc_player_rank_details', compact('rankingType', 'videoGallery', 'magazine', 'icc_player_rank'));
    } */
    /* icc ranking end */
    /* fifa ranking start */

    public function fifa_ranking()
    {
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.ranking.fifa_ranking', compact('videoGallery', 'magazine'));
    }

    public function fifa_ranking_team()
    {
        $rankingType = "team";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.ranking.fifa_team_ranking_details', compact('rankingType', 'videoGallery', 'magazine'));
    }
    public function fifa_ranking_striker()
    {
        $rankingType = "striker";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.ranking.fifa_team_ranking_details', compact('rankingType', 'videoGallery', 'magazine'));
    }
    public function fifa_ranking_mid_fielder()
    {
        $rankingType = "midf";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.ranking.fifa_team_ranking_details', compact('rankingType', 'videoGallery', 'magazine'));
    }
    public function fifa_ranking_goal_keeper()
    {
        $rankingType = "goalk";
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $magazine = Magazine::first();
        return view('frontend.pages.ranking.fifa_team_ranking_details', compact('rankingType', 'videoGallery', 'magazine'));
    }
    /* fifa ranking end */

    /* series ranking start */
   /*  public function recent_series($seriesId, $seo_title)
    {
        $news = News::firstOrFail();
        $latest_news = News::where('status', 'publish')->orderBy('created_at', 'desc')->limit(5)->get();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $photoGallery = PhotoGallery::where('status', 'publish')->where('parent_id', null)->limit(6)->get();
        $magazine = Magazine::first();




         $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/series/v1/$seriesId",
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

        $seriesMatches = json_decode($response);
        $seriesMatcheseo = $seriesMatches->appIndex->seoTitle;
        if (preg_match('/^(.*?) live scores, schedule and results/', $seriesMatcheseo, $matches)) {
            $title = trim($matches[1]);
        } else {
            echo "Title not found";
        }
        $seriesMatches = $seriesMatches->matchDetails;  
        

        
        return view('frontend.pages.series.series', compact('videoGallery', 'magazine', 'photoGallery', 'news', 'latest_news', 'seriesMatches', 'title', 'seriesId',
            'series_squad'
        ));
    } */

    /* series ranking end */
   /*  public function series_details($seriesId, $seo_title, $category)
    {

        $news = News::firstOrFail();
        $latest_news = News::where('status', 'publish')->orderBy('created_at', 'desc')->limit(5)->get();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $photoGallery = PhotoGallery::where('status', 'publish')->where('parent_id', null)->limit(6)->get();
        $magazine = Magazine::first();

        return view('frontend.pages.series.series_stat_details', compact('news', 'latest_news', 'photoGallery', 'videoGallery', 'magazine', 'category', 'seriesId'));
    } */

    /* public function faq()
    {
        $faqQuestion = Faq::whereNotNull('parent_id')->get();

        $faqTitle = Faq::Where('parent_id', null)->get();
        $metaData = Meta::where('page_name', 'faq')->first();
        return view('frontend.pages.faq', compact('faqTitle', 'faqQuestion', 'metaData'));
    } */
    public function privacy()
    {
        $privacy = Privacy::first();
        $metaData = Meta::where('page_name', 'privacy_policy')->first();
        return view('frontend.pages.privacy', compact('privacy', 'metaData'));
    }
    public function desclaimer()
    {
        $desclaimer = Desclaimer::first();
        $metaData = Meta::where('page_name', 'disclaimer')->first();
        return view('frontend.pages.desclaimer', compact('desclaimer', 'metaData'));
    }
    public function terms_condition()
    {
        $terms_condition = Terms::first();
        $metaData = Meta::where('page_name', 'terms_and_condition')->first();
        return view('frontend.pages.terms_condition', compact('terms_condition', 'metaData'));
    }
    public function dmca()
    {
        $dmca = Desclaimer::select('dmca_content')->first();
        $metaData = Meta::where('page_name', 'dmca')->first();
        return view('frontend.pages.dmca', compact('dmca', 'metaData'));
    }




    public function all_photo_gallery()
    {
        $photoGallery = PhotoGallery::where('status', 'publish')->where('parent_id', null)->paginate(18);
        $metaData = Meta::where('page_name', 'photo_gallery')->first();
        return view('frontend.pages.all_photo_gallery', compact('photoGallery', 'metaData'));
    }
    public function photo_gallery($slug)
    {
        try {
            $parentGallery = PhotoGallery::where('slug', $slug)->first();

            if ($parentGallery) {
                $photoGallery = PhotoGallery::where('parent_id', $parentGallery->id)->get();
                $metaData = Meta::where('page_name', 'photo_gallery')->first();
                return view('frontend.pages.photo_gallery', compact('metaData', 'parentGallery', 'photoGallery'));
            } else {
                return abort(404);
            }
        } catch (\Exception $e) {
            // Handle the exception here (e.g., log the error, display a generic error page, etc.)
            return abort(500); // You can customize this based on your error handling requirements
        }
    }
    public function all_video_gallery()
    {
        $videoGallery = VideoGallery::where('status', 'publish')->orderBy('date', 'desc')->paginate(18);
        $metaData = Meta::where('page_name', 'video_gallery')->first();

        return view('frontend.pages.all_video_gallery', compact('videoGallery', 'metaData'));
    }
    public function single_video($slug)
    {
        $single_video = VideoGallery::where('slug', $slug)->first();
        $photoGallery = PhotoGallery::where('status', 'publish')->where('parent_id', null)->limit(6)->get();
        $magazine = Magazine::first();
        $related_video = VideoGallery::where('id', '!=', $single_video->id)
            ->orderBy('id', 'desc')
            ->inRandomOrder()
            ->limit(6)->get();
        $metaData = Meta::where('page_name', 'video_gallery')->first();

        return view('frontend.pages.single_video', compact('single_video', 'photoGallery', 'magazine', 'related_video', 'metaData'));
    }
    public function match_football()
    {
        $news = News::firstOrFail();
        $latest_news = News::where('status', 'publish')->orderBy('created_at', 'desc')->limit(5)->get();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $photoGallery = PhotoGallery::where('status', 'publish')->where('parent_id', null)->limit(6)->get();
        return view('frontend.pages.match_details_football', compact('news', 'videoGallery', 'photoGallery', 'latest_news'));
    }
   /*  public function match($leageId, $matchId, $slug)
    {
        $news = News::firstOrFail();
        $latest_news = News::where('status', 'publish')->orderBy('created_at', 'desc')->limit(5)->get();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $photoGallery = PhotoGallery::where('status', 'publish')->where('parent_id', null)->limit(6)->get();


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/mcenter/v1/$matchId/comm",
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



        $test_league_api = json_decode($response);
        if (isset($test_league_api)) {
            if ($test_league_api->miniscore) {

                $miniscore = $test_league_api->miniscore;
            }
            $matchHeader = $test_league_api->matchHeader;
            $commentary = $test_league_api->commentaryList;


            $teamOneName = $matchHeader->team1->name;
            $teamTwoName = $matchHeader->team2->name;

            $teamOneID = $matchHeader->team1->id;
            $teamTwoID = $matchHeader->team2->id;
            return view('frontend.pages.match_details', compact('news', 'videoGallery', 'photoGallery', 'latest_news', 'miniscore', 'matchHeader', 'commentary', 'matchId', 'teamOneID', 'teamTwoID', 'teamOneName', 'teamTwoName'));
        } else {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/mcenter/v1/$matchId",
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

            $scheduled_match_json = json_decode($response);
            $scheduled_match_info = $scheduled_match_json->matchInfo;
            $team1Squad = $scheduled_match_info->team1->playerDetails;
            $team2Squad = $scheduled_match_info->team2->playerDetails;

            return view('frontend.pages.match_details_upcoming', compact('news', 'videoGallery', 'photoGallery', 'latest_news', 'matchId', 'scheduled_match_info', 'team1Squad', 'team2Squad'));
        }
    } */
    public function match_type()
    {
    }
    /* public function match($leageId,$matchId)
    {
        $news = News::firstOrFail();
        $latest_news = News::where('status', 'publish')->orderBy('created_at', 'desc')->limit(5)->get();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $photoGallery = PhotoGallery::where('status', 'publish')->where('parent_id', null)->limit(6)->get();

        $APIkey = '241e93281f895b0c4d150ef8ecb8c303ca6902d047ef33cda4f09cfa9396a37b';

        $curl_options = array(
            CURLOPT_URL => "https://apiv2.allsportsapi.com/cricket/?met=Livescore&APIkey=$APIkey&leagueId=$leageId&matchId=$matchId",
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
        $cricket_api_data = $data[0];
    
       
        return view('frontend.pages.match_details', compact('news', 'videoGallery', 'photoGallery', 'latest_news', 'cricket_api_data'));
    } */
    public function match_commentry(Request $request)
    {
        $commentry = $request->commentry;

        if ($commentry) {
            $html = view('frontend.partial.commnetry')->render();
        } else {
            $html = '<h1>No Products Found</h1>';
        }

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function match_upcoming()
    {
        $news = News::firstOrFail();
        $latest_news = News::where('status', 'publish')->orderBy('created_at', 'desc')->limit(5)->get();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();
        $photoGallery = PhotoGallery::where('status', 'publish')->where('parent_id', null)->limit(6)->get();
        return view('frontend.pages.match_details_upcoming', compact('news', 'videoGallery', 'photoGallery', 'latest_news'));
    }
    public function fixture_cricket()
    {
        $magazine = Magazine::first();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();



        return view('frontend.pages.fixture.cricket', compact('magazine', 'videoGallery'));
    }
    public function fixture_football()
    {
        $magazine = Magazine::first();
        $videoGallery = VideoGallery::where('status', 'publish')->limit(6)->get();

        return view('frontend.pages.fixture.football', compact('magazine', 'videoGallery'));
    }
}
