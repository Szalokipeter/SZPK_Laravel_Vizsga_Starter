<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function show(Request $request, $Vehicleid)
    {
        $vehicle = Vehicle::find($Vehicleid);
        if (!$vehicle) {
            return response("A megadott járművel nem érhető el utazási ajánlat.", 404);
        }


        // $journeys = $vehicle->journeys()->get();
        // $journeys = Journey::where("vehicle", $vehicle->id)->get();



        // $journeys = Journey::join('vehicles', 'journeys.vehicle', '=', 'vehicles.id')
        //     ->where('journeys.vehicle', $vehicle->id)
        //     ->select('journeys.*', 'vehicles.type')
        //     ->get(); // hozzáadjuk a másik tábla mezőjét, de a nevét sem írjuk át, és a kapcsoló mezőt sem vesszük ki a válaszból

        // $journeys = Journey::join('vehicles', 'journeys.vehicle', '=', 'vehicles.id')
        //           ->where('journeys.vehicle', $vehicle->id)
        //           ->select('journeys.id', 'vehicles.type as vehicle', 'journeys.country', 'journeys.description', 'journeys.departure', 'journeys.capacity', 'journeys.pictureUrl')
        //           ->get(); // a mezők felsorolásával (és azok sorrendjével) megmondhatjuk mit és milyen névvel adjon vissza

        $journeys = Journey::where('vehicle', $vehicle->id)
            ->with('vehicle')
            ->get();
        return response()->json($journeys);
    }

    //cascade delete
    public function delete_vehicle(Request $request, $id){
        $vehicle = Vehicle::find($id);
        if (!$vehicle) {
            return response("A megadott járművel nem érhető el gépjármű.", 404);
        }
        if($request->query('cascade') === 'true'){
            $vehicle->journeys()->delete();
        }
        $vehicle->delete();

        return response()->noContent();
    }
}
