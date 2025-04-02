<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgencyController extends Controller
{
    public function get_agency_missions_count(){
        $result = DB::table('space_agencies')
        ->join('missions', "space_agencies._id", "=", "missions.agency_id")
        ->groupBy("space_agencies.name")
        ->select('space_agencies.name', DB::raw('COUNT(*) AS total_missions'))
        ->get();
        return response()->json($result, 200);
    }
}
