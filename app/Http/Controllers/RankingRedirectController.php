<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankingRedirectController extends Controller
{
    public function icc_test_team_rank_short()
    {
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



        $cricket_team_test = json_decode($response);
        $cricket_team_test = array_slice($cricket_team_test->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_test_team_short', [
            'cricket_team_test' => $cricket_team_test,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function icc_odi_team_rank_short()
    {
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



        $cricket_team_odi = json_decode($response);
        $cricket_team_odi = array_slice($cricket_team_odi->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_odi_team_short', [
            'cricket_team_odi' => $cricket_team_odi,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function icc_t20_team_rank_short()
    {
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

        $cricket_team_t = json_decode($response);
        $cricket_team_t = array_slice($cricket_team_t->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_t20_team_short', [
            'cricket_team_t' => $cricket_team_t,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    /*  public function icc_test_team_rank_full(){
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
    } */

    public function icc_test_batter_rank_short()
    {
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
        $batter_rank_test = array_slice($batter_rank_test->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_test_batter_rank_short', [
            'batter_rank_test' => $batter_rank_test,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function icc_odi_batter_rank_short()
    {
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
        $batter_rank_odi = array_slice($batter_rank_odi->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_odi_batter_rank_short', [
            'batter_rank_odi' => $batter_rank_odi,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function icc_t20_batter_rank_short()
    {
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
        $batter_rank_T = array_slice($batter_rank_T->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_t20_batter_rank_short', [
            'batter_rank_T' => $batter_rank_T,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function icc_test_bowler_rank_short()
    {
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
        $bowler_rank_test = array_slice($bowler_rank_test->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_test_bowler_rank_short', [
            'bowler_rank_test' => $bowler_rank_test,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function icc_odi_bowler_rank_short()
    {
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
        $bowler_rank_odi = array_slice($bowler_rank_odi->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_odi_bowler_rank_short', [
            'bowler_rank_odi' => $bowler_rank_odi,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function icc_t20_bowler_rank_short()
    {
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
        $bowler_rank_T = array_slice($bowler_rank_T->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_t20_bowler_rank_short', [
            'bowler_rank_T' => $bowler_rank_T,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function icc_test_ar_rank_short()
    {
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


        $ar_rank_test = json_decode($response);
        $ar_rank_test = array_slice($ar_rank_test->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_test_ar_rank_short', [
            'ar_rank_test' => $ar_rank_test,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function icc_odi_ar_rank_short()
    {
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


        $ar_rank_odi = json_decode($response);
        $ar_rank_odi = array_slice($ar_rank_odi->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_odi_ar_rank_short', [
            'ar_rank_odi' => $ar_rank_odi,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function icc_t20_ar_rank_short()
    {
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


        $ar_rank_T = json_decode($response);
        $ar_rank_T = array_slice($ar_rank_T->rank, 0, 6);

        $html = view('frontend.render.ranking.icc_t20_ar_rank_short', [
            'ar_rank_T' => $ar_rank_T,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
}
