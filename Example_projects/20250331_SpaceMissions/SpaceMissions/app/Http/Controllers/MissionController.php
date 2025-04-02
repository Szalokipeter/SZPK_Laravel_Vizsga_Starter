<?php

namespace App\Http\Controllers;

use App\Http\Resources\MissionRescource;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MissionController extends Controller
{
    public function get_mission($id){
        $mission = Mission::find($id);
        if(!$mission){
            return response()->json(["message" => "Mission not found"], 404);
        }
        return response()->json(new MissionRescource($mission));
    }
    public function get_all_missions(){
        $missions = Mission::with("agency", "commander")->orderBy('launch_date', 'asc')->get();
        $index = 0;
        foreach ($missions as $mission) {
            $index++;
            $mission["index"] = $index;
        }
        return response()->json($missions);
    }
    public function create_mission(Request $req){
        $validator = Validator::make($req->all(), [
            "name" => "required|string",
            "agency_id" => "required|exists:space_agencies,_id",
            "launch_date" => "required|date"
        ]);
        if($validator->fails()){
            // return response()->json(["message" => "Hiányos adatok"], 422);
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $mission = Mission::create($req->only('name', 'agency_id', 'launch_date'));
        return response()->json($mission, 201);
    }
    public function delete_mission($id){
        $mission = Mission::find($id);
        if(!$mission){
            return response()->json(["message" => "Mission not found"], 404);
        }
        if($mission->commander){
            return response()->json(["message" => "Mission cannot be deleted, it has commander: " . $mission->commander->commander_name]);
        }
        $mission->delete();
        return response()->json(["message" => "Mission deleted successfully"]);
    }
}
