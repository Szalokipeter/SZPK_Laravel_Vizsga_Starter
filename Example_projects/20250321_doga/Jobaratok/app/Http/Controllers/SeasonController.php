<?php

namespace App\Http\Controllers;

use App\Http\Requests\customRequest;
use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function searchBySeason(Request $request, $seasonName){
        $season = Season::where("season", $seasonName)->get()[0];
        if(!$season){
            return response()->json(["message"=> "Hibás évad!"], 404);
        }
        $episodes = Episode::where("seasonId", $season->id)->get();
        return response()->json($episodes);
    }
    public function addSeason(customRequest $request){
        $validated = $request->validated();
        $newSeason = Season::create($validated);
        return response()->json(["id" => $newSeason->id], 201);
    }
    public function deleteSeason(Request $request, $id){
        $season = Season::find($id);
        if(!$season){
            return response()->json(["message" => "Az évad nem létezik!"], 404);
        }
        $episodes = Episode::where("seasonId", $id)->get();
        if($episodes->isNotEmpty()){
            return response()->json(["message" => "Az évad nem törölhető!"], 403);
        }
        $season->delete();

        return response()->noContent();
    }
}
