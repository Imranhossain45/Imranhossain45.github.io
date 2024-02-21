<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PlayerData;
use Illuminate\Http\Request;

class PlayerDataController extends Controller
{
    public function create()
    {
        return view('backend.playerData.cricket.create');
    }
    public function store(Request $request)
    {


        /* $data = [
            "player" => [
                [
                    "id" => $request->id,
                    "name" => $request->name,
                    "imageId" => $request->imageId,
                    "battingStyle" => $request->battingStyle,
                    "bowlingStyle" => $request->bowlingStyle
                ]
            ]
        ];


        PlayerData::create([
            'cricket_data' => json_encode($data),
        ]); */


        /*  PlayerData::create([
            'cricketer_data' => json_encode([
                'id' => $request->id,
                'name' => $request->name,
                'imageId' => $request->imageId,
                'battingStyle' => $request->battingStyle,
                'bowlingStyle' => $request->bowlingStyle,
            ]),
        ]); */
        $playerData = ([
            'id' => $request->id,
            'name' => $request->name,
            'imageId' => $request->imageId,
            'battingStyle' => $request->battingStyle,
            'bowlingStyle' => $request->bowlingStyle,
        ]);

        // Construct the outer structure and include the encoded player data directly
        $jsonData = json_encode([
            "player" => [$playerData],
        ]);

        // Create a new PlayerData record with the JSON data
        PlayerData::create([
            'cricketer_data' => $jsonData,
        ]);
        return back();
    }
}
