<?php

use App\Http\Controllers\SeasonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("search-by-season/{season}", [SeasonController::class, "searchBySeason"]);
Route::post("add-season", [SeasonController::class, "addSeason"]);
Route::delete("delete-season/{id}", [SeasonController::class, "deleteSeason"]);
