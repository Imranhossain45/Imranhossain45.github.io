<?php

namespace App\Http\Controllers\Redirect;

use App\Models\PlayerData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PageRedirectController extends Controller
{
    public function headerCricketScoreData(Request $request)
    {

        /* $matchType = $request->matchType;

        if ($matchType == 'live') {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/matches/v1/live",
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
            $livecricketMatch = json_decode($response); */
            /* if ($livecricketMatch) {
                $typeMatches = $livecricketMatch->typeMatches;
                $cricket_api_live = [];
                $progressImages = [];

                foreach ($typeMatches as $typeMatch) {
                    foreach ($typeMatch->seriesMatches as $seriesMatch) {
                        if (isset($seriesMatch->seriesAdWrapper->matches)) {
                            foreach ($seriesMatch->seriesAdWrapper->matches as $match) {
                                $cricket_api_live[] = $match;
                                $matcInfos = $match->matchInfo;
                                if ($matcInfos->state == 'In Progress') {
                                    $team1_img = $matcInfos->team1->imageId;
                                    $team2_img = $matcInfos->team2->imageId;
                                    $progressImages[] = array('team1_img' => $team1_img, 'team2_img' => $team2_img);
                                }
                            }
                        }
                    }
                }
            } */
           /*  if ($livecricketMatch) {
                $typeMatches = $livecricketMatch->typeMatches;
                $cricket_api_live = [];
                $progressImages = null;

                if (Session::has('progressImages')) {
                    $progressImages = Session::get('progressImages', []);
                }

                foreach ($typeMatches as $typeMatch) {
                    foreach ($typeMatch->seriesMatches as $seriesMatch) {
                        if (isset($seriesMatch->seriesAdWrapper->matches)) {
                            foreach ($seriesMatch->seriesAdWrapper->matches as $match) {
                                $cricket_api_live[] = $match;
                                $matcInfos = $match->matchInfo;
                                if (!Session::has('progressImages')) {
                                    if ($matcInfos->state == 'In Progress') {
                                        $team1_img = $matcInfos->team1->imageId;
                                        $team2_img = $matcInfos->team2->imageId;
                                        $progressImages[] = array('team1_img' => $team1_img, 'team2_img' => $team2_img);
                                    }
                                }
                            }
                        }
                    }
                }
                Session::put('progressImages', $progressImages);
            } */
       /*  } */

        /* if ($matchType == 'complete') {
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/matches/v1/recent",
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
            $test_league_api = json_decode($response);
            if ($test_league_api) {
                $typeMatches = $test_league_api->typeMatches;
                $cricket_api_recent = [];
                $completeImages = [];
                foreach ($typeMatches as $typeMatch) {
                    foreach ($typeMatch->seriesMatches as $seriesMatch) {
                        if (isset($seriesMatch->seriesAdWrapper->matches)) {
                            foreach ($seriesMatch->seriesAdWrapper->matches as $match) {
                                $cricket_api_recent[] = $match;
                                $matcInfos = $match->matchInfo;
                                $matchEndDate = property_exists($matcInfos, 'endDate') ? $matcInfos->endDate : null;
                                $matchEndDate = \Carbon\Carbon::parse($matchEndDate / 1000);
                                $timeDifference = now()->diffInHours($matchEndDate);
                                if ($matcInfos->state == 'Complete' && $timeDifference <= 4) {
                                    $complete_team1_img = $matcInfos->team1->imageId;
                                    $complete_team2_img = $matcInfos->team2->imageId;
                                    $completeImages[] = array('team1_img' => $complete_team1_img, 'team2_img' => $complete_team2_img);
                                }
                            }
                        }
                    }
                }
            }
        } */


        /* if ($matchType == 'schedule') { */
            /* $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/matches/v1/upcoming",
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

            $upcomingcricketMatch = json_decode($response);


            if ($upcomingcricketMatch) {
                $typeMatches = $upcomingcricketMatch->typeMatches;
                $cricket_api_upcoming = [];
                $scheduleImages = [];
                $match_state=[]; */
                /* $timeDifference_arr = []; */

                /* foreach ($typeMatches as $typeMatch) {
                    foreach ($typeMatch->seriesMatches as $seriesMatch) {
                        if (isset($seriesMatch->seriesAdWrapper->matches)) {
                            foreach ($seriesMatch->seriesAdWrapper->matches as $match) {
                                $cricket_api_upcoming[] = $match;
                                $matcInfos = $match->matchInfo;
                                $matchstartDate = property_exists($matcInfos, 'startDate') ? $matcInfos->startDate : null;

                                $matchstartDateInSeconds = $matchstartDate / 1000;
                                $matchStartDateTime = \Carbon\Carbon::createFromTimestamp($matchstartDateInSeconds, 'Asia/Dhaka');
                                $currentDateTime = \Carbon\Carbon::now('Asia/Dhaka');
                                $timeDifference = $currentDateTime->diffInHours($matchStartDateTime);

                                $match_state[]= $matcInfos->state;
                                
                                if ($matcInfos->state == 'Upcoming' && $timeDifference <= 24) {
                                    $upcoming_team1_img = $matcInfos->team1->imageId;
                                    $upcoming_team2_img = $matcInfos->team2->imageId;
                                    $scheduleImages[] = array('team1_img' => $upcoming_team1_img, 'team2_img' => $upcoming_team2_img);
                                }
                                if($matcInfos->state == 'Preview' && $timeDifference <= 24){
                                    $upcoming_team1_img = $matcInfos->team1->imageId;
                                    $upcoming_team2_img = $matcInfos->team2->imageId;
                                    $scheduleImages[] = array('team1_img' => $upcoming_team1_img, 'team2_img' => $upcoming_team2_img);
                                }
                                
                            }
                        }
                    }
                } */
            }
            /* $timeDifference_arr[]= $timeDifference; */
            /* $time_diff_new_arr=[];
            foreach($timeDifference_arr as $time_diff){
                if($time_diff <=24){
                    $time_diff_new_arr[] = $time_diff;
                }
            }
            dd($time_diff_new_arr); */
        /* } */

     /*    $html = view(
            'layouts.frontend.render.headerCricketScoreData',
            [
                'cricket_api_live' => @$cricket_api_live,
                'cricket_api_recent' => @$cricket_api_recent,
                'cricket_api_upcoming' => @$cricket_api_upcoming,
                'matchType' => @$matchType,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'progressImages' => @$progressImages,
            'completeImages' => @$completeImages,
            'scheduleImages' => @$scheduleImages,
        ]); */
   /*  } */
    public function cricketPlayerData()
    {
        /* $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/teams/v1/league",
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

        $team_json_data = json_decode($response);
        $team_json_data = $team_json_data->list;

        $player_json_data = [];

        foreach ($team_json_data as $team_data) {
            if (property_exists($team_data, 'teamId')) {
                $team_id = $team_data->teamId;

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/teams/v1/$team_id/players",
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

                $player_data = json_decode($response);

                if ($response) {
                    $player_json_data[] = $player_data;
                }
            }
        } */





        /* 
        foreach ($player_json_data as $p_j_data) {
    $existing_player_data = PlayerData::where('cricketer_data', json_encode($p_j_data))->first();
    
    if ($existing_player_data) {
        // Update existing player data
        $existing_player_data->cricketer_data = json_encode($p_j_data);
        $existing_player_data->save();
    } else {
        // Insert new player data into the same column
        $new_player_data = new PlayerData();
        $new_player_data->cricketer_data = json_encode($p_j_data);
        $new_player_data->save();
    }
}

         */


        $player_json_data = [];
        $player_json_data_all = PlayerData::get();
        foreach ($player_json_data_all as $player_data) {
            $player_data = json_decode($player_data->cricketer_data);
            foreach ($player_data as $player_info) {
                foreach ($player_info as $player) {
                    if (isset($player->id)) {
                        $player_json_data[] = $player;
                    }
                }
            }
        }






        $html = view(
            'frontend.1st_block.rightside.render.cricketPlayerData',
            [
                'player_json_data' => $player_json_data,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }


    /*  public function headerCricketScoreData()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/matches/v1/recent",
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



        $test_league_api = json_decode($response);

        if ($test_league_api) {
            $typeMatches = $test_league_api->typeMatches;
            $cricket_api_recent = [];

            foreach ($typeMatches as $typeMatch) {
                foreach ($typeMatch->seriesMatches as $seriesMatch) {
                    if (isset($seriesMatch->seriesAdWrapper->matches)) {
                        foreach ($seriesMatch->seriesAdWrapper->matches as $match) {
                            // Extract the match information and add it to the $matchesData array
                            $cricket_api_recent[] = $match;
                        }
                    }
                }
            }
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/matches/v1/live",
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


        $livecricketMatch = json_decode($response);

        if ($livecricketMatch) {
            $typeMatches = $livecricketMatch->typeMatches;
            $cricket_api_live = [];

            foreach ($typeMatches as $typeMatch) {
                foreach ($typeMatch->seriesMatches as $seriesMatch) {
                    if (isset($seriesMatch->seriesAdWrapper->matches)) {
                        foreach ($seriesMatch->seriesAdWrapper->matches as $match) {
                            // Extract the match information and add it to the $matchesData array
                            $cricket_api_live[] = $match;
                        }
                    }
                }
            }
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/matches/v1/upcoming",
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

        $upcomingcricketMatch = json_decode($response);


        if ($upcomingcricketMatch) {
            $typeMatches = $upcomingcricketMatch->typeMatches;
            $cricket_api_upcoming = [];

            foreach ($typeMatches as $typeMatch) {
                foreach ($typeMatch->seriesMatches as $seriesMatch) {
                    if (isset($seriesMatch->seriesAdWrapper->matches)) {
                        foreach ($seriesMatch->seriesAdWrapper->matches as $match) {
                            // Extract the match information and add it to the $matchesData array
                            $cricket_api_upcoming[] = $match;
                        }
                    }
                }
            }
        }

        $html = view(
            'layouts.frontend.render.headerCricketScoreData',
            [
                'cricket_api_live' => $cricket_api_live,
                'cricket_api_recent' => $cricket_api_recent,
                'cricket_api_upcoming' => $cricket_api_upcoming,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }


    public function international_schedule(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/schedule/v1/international",
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

        $scheduled_match_int = json_Decode($response);
        $scheduled_match_int = $scheduled_match_int->matchScheduleMap;

        $scheduled_match_list_int = [];
        foreach ($scheduled_match_int as $matchScheduleList) {

            if (isset($matchScheduleList->scheduleAdWrapper)) {
                $matchScheduleList = $matchScheduleList->scheduleAdWrapper->matchScheduleList;

                foreach ($matchScheduleList as $scheduled_match) {
                    $scheduled_match_list_int[] = $scheduled_match;
                }
            }
        }

        $html = view(
            'frontend.pages.fixture.render.international_data',
            [
                'scheduled_match_list_int' => $scheduled_match_list_int,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function league_schedule(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/schedule/v1/league",
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

        $scheduled_match_leg = json_Decode($response);
        $scheduled_match_leg = $scheduled_match_leg->matchScheduleMap;

        $scheduled_match_list_leg = [];
        foreach ($scheduled_match_leg as $matchScheduleList) {

            if (isset($matchScheduleList->scheduleAdWrapper)) {
                $matchScheduleList = $matchScheduleList->scheduleAdWrapper->matchScheduleList;

                foreach ($matchScheduleList as $scheduled_match) {
                    $scheduled_match_list_leg[] = $scheduled_match;
                }
            }
        }

        $html = view(
            'frontend.pages.fixture.render.league_data',
            [
                'scheduled_match_list_leg' => $scheduled_match_list_leg,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function domestic_schedule(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/schedule/v1/domestic",
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

        $scheduled_match_dom = json_Decode($response);
        $scheduled_match_dom = $scheduled_match_dom->matchScheduleMap;

        $scheduled_match_list_dom = [];
        foreach ($scheduled_match_dom as $matchScheduleList) {

            if (isset($matchScheduleList->scheduleAdWrapper)) {
                $matchScheduleList = $matchScheduleList->scheduleAdWrapper->matchScheduleList;

                foreach ($matchScheduleList as $scheduled_match) {
                    $scheduled_match_list_dom[] = $scheduled_match;
                }
            }
        }


        $html = view(
            'frontend.pages.fixture.render.domestic_data',
            [
                'scheduled_match_list_dom' => $scheduled_match_list_dom,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function women_schedule(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/schedule/v1/women",
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

        $scheduled_match_women = json_Decode($response);
        $scheduled_match_women = $scheduled_match_women->matchScheduleMap;

        $scheduled_match_list_women = [];
        foreach ($scheduled_match_women as $matchScheduleList) {

            if (isset($matchScheduleList->scheduleAdWrapper)) {
                $matchScheduleList = $matchScheduleList->scheduleAdWrapper->matchScheduleList;

                foreach ($matchScheduleList as $scheduled_match) {
                    $scheduled_match_list_women[] = $scheduled_match;
                }
            }
        }

        $html = view(
            'frontend.pages.fixture.render.women_data',
            [
                'scheduled_match_list_women' => $scheduled_match_list_women,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
     
    ;

    

    public function recentSeriesData()
    {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/series/v1/international",
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

        $recent_series_json = json_decode($response);
        $recent_series_int = $recent_series_json->seriesMapProto[0];


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/series/v1/league",
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
        $recent_series_leg_json = json_decode($response);
        if (isset($recent_series_leg_json)) {
            $recent_series_leg = $recent_series_leg_json->seriesMapProto[0];
            $recent_series_leg_one = $recent_series_leg_json->seriesMapProto[1];
        }


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/series/v1/domestic",
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

        $recent_series_dom = json_decode($response);
        if(isset($recent_series_dom)){
            $recent_series_dom = $recent_series_dom->seriesMapProto[3];
        }

        $html = view(
            'frontend.1st_block.rightside.render.recentSeries',
            [
                'recent_series_int' => $recent_series_int,
                'recent_series_leg' => $recent_series_leg,
                'recent_series_leg_one' => $recent_series_leg_one,
                'recent_series_dom' => $recent_series_dom,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function iccTeamRankT20Data()
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

        $cricket_team_t = array_slice($cricket_team_t->rank, 0, 10);

        if (isset($cricket_team_t)) {
            $html = view(
                'frontend.render.iccteamRankT20',
                [
                    'cricket_team_t' => $cricket_team_t,
                ]
            )->render();
        } else {
            $html = '<h5>Something Went Wrong</h5>';
        }

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function iccTeamRankOdiData()
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

        $cricket_team_odi = array_slice($cricket_team_odi->rank, 0, 10);

        if (isset($cricket_team_odi)) {
            $html = view(
                'frontend.render.iccteamrankOdi',
                [
                    'cricket_team_odi' => $cricket_team_odi,
                ]
            )->render();
        } else {
            $html = '<h5>Something Went Wrong</h5>';
        }

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function iccTeamRankTestData()
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
        $cricket_team_test = array_slice($cricket_team_test->rank, 0, 10);

        if (isset($cricket_team_test)) {
            $html = view(
                'frontend.render.iccteamRankTest',
                [
                    'cricket_team_test' => $cricket_team_test,
                ]
            )->render();
        } else {
            $html = '<h5>Something Went Wrong</h5>';
        }

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    

    public function scorecard_value(Request $request)
    {

        $matchId = $request->matchId;
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/mcenter/v1/$matchId/scard",
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

        $matchScoreJson = json_decode($response);
        $matchScoreCardFirst = $matchScoreJson->scoreCard[0];

        $matchScoreCardSecond = $matchScoreJson->scoreCard[1] ?? null;
        $matchScoreCardThird = $matchScoreJson->scoreCard[2] ?? null;
        $matchScoreCardFourth = $matchScoreJson->scoreCard[3] ?? null;


        $html = view(
            'frontend.render.match_details.scorecard',

            [
                'matchScoreCardFirst' => $matchScoreCardFirst,
                'matchScoreCardSecond' => $matchScoreCardSecond,
                'matchScoreCardThird' => $matchScoreCardThird,
                'matchScoreCardFourth' => $matchScoreCardFourth,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function squadData(Request $request)
    {



        $matchId = $request->matchId;
        $teamOneID = $request->teamOneId;
        $teamTwoID = $request->teamTwoID;
        $teamOneName = $request->teamOneName;
        $teamTwoName = $request->teamTwoName;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/mcenter/v1/$matchId/team/$teamOneID",
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

        $squad_team_one = json_decode($response);
        if (isset($squad_team_one)) {
            $squad_team_one = $squad_team_one->players;
        }




        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/mcenter/v1/$matchId/team/$teamTwoID",
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

        $squad_team_two = json_decode($response);
        if (isset($squad_team_two)) {
            $squad_team_two = $squad_team_two->players;
        }

        $html = view(
            'frontend.render.match_details.squad',

            [
                'squad_team_one' => $squad_team_one,
                'squad_team_two' => $squad_team_two,
                'teamOneName' => $teamOneName,
                'teamTwoName' => $teamTwoName,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public function matchInfo(Request $request)
    {

        $matchId = $request->matchId;

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

        $match_info_json = json_decode($response);
        $match_info = $match_info_json->matchInfo;
        $vanue_info = $match_info_json->venueInfo;
        $html = view(
            'frontend.render.match_details.matchInfo',

            [
                'match_info' => $match_info,
                'vanue_info' => $vanue_info,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    public static function player_info($playerId)
    {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/player/$playerId",
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
        $player_info_json = json_decode($response);

        return $player_info_json;
    } */

    public function api_image(Request $request)
    {
        $teamOneImg = $request->teamOne;
        $teamTwoImg = $request->teamTwo;
        $teamOneImg = SeriesRedirectController::squad_image($teamOneImg);
        $teamTwoImg = SeriesRedirectController::squad_image($teamTwoImg);

        return response()->json([
            'success' => true,
            'teamOne' => $teamOneImg,
            'teamTwo' => $teamTwoImg,
        ]);
    }

    public function cricketPlayerinfoBatting(Request $request)
    {
        $id = $request->id;
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/player/$id/batting",
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
        $player_info_batting = json_decode($response);
        $player_info_batting = $player_info_batting->values;

        $html = view(
            'frontend.pages.player.render.cricketer_batting_info',

            [
                'player_info_batting' => $player_info_batting,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
    public function cricketPlayerinfoBowling(Request $request)
    {
        $id = $request->id;
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/stats/v1/player/$id/bowling",
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
        $player_info_bowling = json_decode($response);
        $player_info_bowling = $player_info_bowling->values;

        $html = view(
            'frontend.pages.player.render.cricketer_bowling_info',

            [
                'player_info_bowling' => $player_info_bowling,
            ]
        )->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
}
