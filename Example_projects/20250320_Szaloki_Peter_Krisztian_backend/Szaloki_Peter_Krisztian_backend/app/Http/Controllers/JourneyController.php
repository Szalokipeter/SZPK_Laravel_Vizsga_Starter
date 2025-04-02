<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJourneyRequest;
use App\Models\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function create_journey(CreateJourneyRequest $request){
        $validated = $request->validated();
        $journey = Journey::create($validated);
        return response()->json(["id" => $journey->id], 201);
    }
    public function delete_journey($id){
        $journey = Journey::find($id);
        if(!$journey){
            return response("Az ajánlat nem létezik.", 404);
        }
        $journey->delete();
        return response()->noContent();
    }

}
