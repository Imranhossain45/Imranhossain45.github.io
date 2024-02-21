<?php

namespace App\Http\Controllers\Redirect;

use App\Models\News;
use App\Models\Magazine;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeriesRedirectController extends Controller
{
    /* public function series_stat_data_full(Request $request)
    {
        $seriesId = $request->seriesId;
        $category = $request->category;
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/series/$seriesId?statsType=$category",
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

        $series_stat_json = json_decode($response);

        if (isset($series_stat_json)) {
            if (property_exists($series_stat_json, 't20StatsList')) {
                $series_stat_data = $series_stat_json->t20StatsList->values;
            } elseif (property_exists($series_stat_json, 'odiStatsList')) {
                $series_stat_data = $series_stat_json->odiStatsList->values;
            } elseif (property_exists($series_stat_json, 'testStatsList')) {

                $series_stat_data = $series_stat_json->testStatsList->values;
            }
        }

        if (isset($series_stat_data)) {
            $html = view('frontend.render.series.series_stat_data', compact('series_stat_data', 'category'))->render();
        } else {
            $html = '<h4 class="text-center">Not Available</h4>';
        }

        return response([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function series_most_runs_short(Request $request)
    {
        $seriesId = $request->seriesId;
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/series/$seriesId?statsType=mostRuns",
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

        $most_runs_json = json_decode($response);


        if (isset($most_runs_json)) {
            if (property_exists($most_runs_json, 't20StatsList')) {
                $most_runs = $most_runs_json->t20StatsList->values;
            } elseif (property_exists($most_runs_json, 'odiStatsList')) {
                $most_runs = $most_runs_json->odiStatsList->values;
            } elseif (property_exists($most_runs_json, 'testStatsList')) {

                $most_runs = $most_runs_json->testStatsList->values;
            }
        }

        if (isset($most_runs)) {
            $html = view('frontend.render.series.series_most_runs_short', compact('most_runs'))->render();
        } else {
            $html = '<h4 class="text-center">Not Available</h4>';
        }
        return response([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function series_most_wickets_short(Request $request)
    {
        $seriesId = $request->seriesId;
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/series/$seriesId?statsType=mostWickets",
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
        $most_wickets_json = json_decode($response);

        if (isset($most_wickets_json)) {
            if (property_exists($most_wickets_json, 't20StatsList')) {
                $most_wickets = $most_wickets_json->t20StatsList->values;
            } elseif (property_exists($most_wickets_json, 'odiStatsList')) {
                $most_wickets = $most_wickets_json->odiStatsList->values;
            } elseif (property_exists($most_wickets_json, 'testStatsList')) {

                $most_wickets = $most_wickets_json->testStatsList->values;
            }
        }

        if (isset($most_wickets)) {
            $html = view('frontend.render.series.series_most_wickets_short', compact('most_wickets'))->render();
        } else {
            $html = '<h4 class="text-center">Not Available</h4>';
        }
        return response([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function series_most_sixes_short(Request $request)
    {
        $seriesId = $request->seriesId;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/series/$seriesId?statsType=mostSixes",
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

        $most_sixes_json = json_decode($response);

        if (isset($most_sixes_json)) {
            if (property_exists($most_sixes_json, 't20StatsList')) {
                $most_sixes = $most_sixes_json->t20StatsList->values;
            } elseif (property_exists($most_sixes_json, 'odiStatsList')) {
                $most_sixes = $most_sixes_json->odiStatsList->values;
            } elseif (property_exists($most_sixes_json, 'testStatsList')) {

                $most_sixes = $most_sixes_json->testStatsList->values;
            }
        }


        if (isset($most_sixes)) {
            $html = view('frontend.render.series.series_most_sixes_short', compact('most_sixes'))->render();
        } else {
            $html = '<h4 class="text-center">Not Available</h4>';
        }
        return response([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function series_most_fours_short(Request $request)
    {
        $seriesId = $request->seriesId;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/series/$seriesId?statsType=mostFours",
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

        $most_fours_json = json_decode($response);

        if (isset($most_fours_json)) {
            if (property_exists($most_fours_json, 't20StatsList')) {
                $most_fours = $most_fours_json->t20StatsList->values;
            } elseif (property_exists($most_fours_json, 'odiStatsList')) {
                $most_fours = $most_fours_json->odiStatsList->values;
            } elseif (property_exists($most_fours_json, 'testStatsList')) {

                $most_fours = $most_fours_json->testStatsList->values;
            }
        }

        if (isset($most_fours)) {
            $html = view('frontend.render.series.series_most_fours_short', compact('most_fours'))->render();
        } else {
            $html = '<h4 class="text-center">Not Available</h4>';
        }
        return response([
            'success' => true,
            'html' => $html,
        ]);
    }
     public function series_highest_score_short(Request $request)
    {
        $seriesId = $request->seriesId;


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/series/$seriesId?statsType=highestScore",
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
        $heghiest_score_json = json_decode($response);

        if (isset($heghiest_score_json)) {
            if (property_exists($heghiest_score_json, 't20StatsList')) {
                $heghiest_score = $heghiest_score_json->t20StatsList->values;
            } elseif (property_exists($heghiest_score_json, 'odiStatsList')) {
                $heghiest_score = $heghiest_score_json->odiStatsList->values;
            } elseif (property_exists($heghiest_score_json, 'testStatsList')) {

                $heghiest_score = $heghiest_score_json->testStatsList->values;
            }
        }

        if (isset($heghiest_score)) {
            $html = view('frontend.render.series.series_highest_score_short', compact('heghiest_score'))->render();
        } else {
            $html = '<h4 class="text-center">Not Available</h4>';
        }
        return response([
            'success' => true,
            'html' => $html,
        ]);
    }
     public function series_best_figure_short(Request $request)
    {
        $seriesId = $request->seriesId;



        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/series/$seriesId?statsType=bestBowlingInnings",
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

        $best_figure_json = json_decode($response);

        if (isset($best_figure_json)) {
            if (property_exists($best_figure_json, 't20StatsList')) {
                $best_figure = $best_figure_json->t20StatsList->values;
            } elseif (property_exists($best_figure_json, 'odiStatsList')) {
                $best_figure = $best_figure_json->odiStatsList->values;
            } elseif (property_exists($best_figure_json, 'testStatsList')) {

                $best_figure = $best_figure_json->testStatsList->values;
            }
        }

        if (isset($best_figure)) {
            $html = view('frontend.render.series.series_best_figure_short', compact('best_figure'))->render();
        } else {
            $html = '<h4 class="text-center">Not Available</h4>';
        }
        return response([
            'success' => true,
            'html' => $html,
        ]);
    }

      public function seriesSquadData(Request $request)
    {
        $seriesId = $request->seriesId;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/series/v1/$seriesId/squads",
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
        $series_squad_json = json_decode($response);
        $series_squads = $series_squad_json->squads; 


        if (!empty($series_squads)) {
            $html = view('frontend.render.series.seriesSquadData', compact('series_squads', 'seriesId'))->render();
        } else {
            $html = '<h4>Not Available</h4>';
        }
        return response([
            'success' => true,
            'html' => $html,
        ]);
        
    }

     public static function single_squad_data($seriesId, $squadId){

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/series/v1/$seriesId/squads/$squadId",
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

        $squadData = json_decode($response);

        return $squadData ?? array();
    }

    */

    public static function squad_image($imageId)
    {

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/img/v1/i1/c$imageId/i.jpg",
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

        if ($err) {
            return null;
        } else {
            // Convert binary image data to base64
            $base64Image = base64_encode($response);

            // Embed the image in a data URI
            $dataUri = 'data:image/jpeg;base64,' . $base64Image;

            // Display the image using an HTML img tag
            return $dataUri;
        }
    }  
}
