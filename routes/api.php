<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\JuegoController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgotten', [AuthController::class, 'forgotten']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/account', [AuthController::class, 'account'])->middleware('auth:sanctum');
Route::post('/askauth', [AuthController::class, 'askauth'])->middleware('auth:sanctum');
Route::post('/genres/getgenres', [GenreController::class, 'getgenres']);
Route::post('/movies/getremotemoviesrandom', [ItemController::class, 'getremotemoviesrandom'])->middleware('auth:sanctum');
Route::post('/movies/getremotemoviesname', [ItemController::class, 'getremotemoviesname'])->middleware('auth:sanctum');
Route::post('/movies/getmovies', [ItemController::class, 'getmovies']);
Route::post('/movies/getmovie', [ItemController::class, 'getmovie']);
Route::post('/movies/addmovie', [ItemController::class, 'addmovie'])->middleware('auth:sanctum');
Route::post('/movies/deletemovie', [ItemController::class, 'deletemovie'])->middleware('auth:sanctum');
Route::post('/movies/updatemovie', [ItemController::class, 'updatemovie'])->middleware('auth:sanctum');
Route::post('/movies/ratemovie', [ItemController::class, 'ratemovie'])->middleware('auth:sanctum');
Route::post('/series/getseries', [ItemController::class, 'getseries']);
Route::post('/series/addserie', [ItemController::class, 'addserie'])->middleware('auth:sanctum');
Route::post('/series/deletserie', [ItemController::class, 'deleteserie'])->middleware('auth:sanctum');
Route::post('/games/getgames', [ItemController::class, 'getgames']);
Route::post('/games/addgame', [ItemController::class, 'addgame'])->middleware('auth:sanctum');
Route::post('/games/deletegame', [ItemController::class, 'deletegame'])->middleware('auth:sanctum');
Route::resource('peliculas', PeliculaController::class);
Route::resource('series', SerieController::class);
Route::resource('juegos', JuegoController::class);
