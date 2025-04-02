<?php

use App\Http\Controllers\JourneyController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("journeys/{Vehicleid}", [VehicleController::class, "getAll_journeys_by_vehicle"]);
Route::post("journey", [JourneyController::class, "create_journey"]);
Route::delete("journey/{id}", [JourneyController::class, "delete_journey"]);

Route::delete("vehicle/{id}", [VehicleController::class, "delete_vehicle"]);
