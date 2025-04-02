<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\CommanderController;
use App\Http\Controllers\MissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("missions", [MissionController::class ,"get_all_missions"]);
Route::get("missions/{id}", [MissionController::class , "get_mission"]);
Route::post("missions", [MissionController::class , "create_mission"]);
Route::get("commanders", [CommanderController::class, "get_all_commanders"]);
Route::post("commanders", [CommanderController::class, "create_commander"]);
Route::get("commanders/count", [CommanderController::class, "commander_count"]);

Route::get("agency-missions", [AgencyController::class, "get_agency_missions_count"]);

Route::delete("missions/{id}", [MissionController::class , "delete_mission"]);
