<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\JuegoController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgotten', [AuthController::class, 'forgotten']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/account', [AuthController::class, 'account'])->middleware('auth:sanctum');
Route::post('/askauth', [AuthController::class, 'askauth'])->middleware('auth:sanctum');
Route::post('/genres', [GenreController::class, 'getgenres']);
Route::resource('peliculas', PeliculaController::class);
Route::resource('series', SerieController::class);
Route::resource('juegos', JuegoController::class);
