<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\JuegoController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('peliculas', PeliculaController::class);
Route::resource('series', SerieController::class);
Route::resource('juegos', JuegoController::class);