<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommanderRescource;
use App\Models\Commander;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommanderController extends Controller
{
    public function get_all_commanders(){
        $commanders = Commander::with("mission")->orderBy("commander_name")->get();
        foreach ($commanders as $commander) {
            $commander = new CommanderRescource($commander);
        }
        return response()->json($commanders);
    }
    public function create_commander(Request $req){
        $validator = Validator::make($req->all(), [
            "commander_name" => "required|string",
            "mission_id" => "required|exists:missions,_id",
            "experience_years" => "nullable|integer"
        ]);
        if($validator->fails()){
            // return response()->json(["message" => "Hiányos adatok"], 422);
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $mission = Mission::find($req->mission_id);
        if($mission->commander){
            return response()->json(["message"=> "A commander already exists for this mission"], 403);
        }
        $commander = Commander::create($req->only('commander_name', 'mission_id', 'experience_years'));
        return response()->json($commander, 201);
    }
    public function commander_count(){
        $commanderCount = Commander::count();
        return response()->json(["count" => $commanderCount]);
    }
}
