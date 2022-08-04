<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/series', SeriesController::class);

    Route::get('/series/{series}/seasons', [SeasonsController::class, 'findAllSeasonsBySerie']);

    Route::get('/series/{series}/episodes', [EpisodesController::class, 'findAllEpisodesBySerie']);

    Route::patch('/episodes/{episode}/watch', [EpisodesController::class, 'watched']);
});

Route::post('/login', [LoginController::class, 'login']);


// Route::apiResource('/series', SeriesController::class);

// Route::get('/series/{series}/seasons', [SeasonsController::class, 'findAllSeasonsBySerie']);

// Route::get('/series/{series}/episodes', [EpisodesController::class, 'findAllEpisodesBySerie']);

// Route::patch('/episodes/{episode}/watch', [EpisodesController::class, 'watched']);

// Route::post('/login', [LoginController::class, 'login']);
