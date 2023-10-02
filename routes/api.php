<?php

namespace App\Http\Controllers;

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


// Route::controller(AuthController::class)->group(function () {
//     Route::post('/register', 'register');
//     Route::post('/login', 'login');
//     Route::post('/forgotten', 'forgotten');
//     Route::middleware('auth:sanctum')->group(function () {
//         Route::post('/logout', 'logout');
//         Route::post('/account', 'account');
//         Route::post('/askauth', 'askauth');
//     });
// });
// Route::controller(ItemController::class)->group(function () {
//     Route::post('/movies/getmovies', 'getmovies');
//     Route::post('/series/getseries', 'getseries');
//     Route::post('/games/getgames', 'getgames');
//     Route::middleware('auth:sanctum')->group(function () {
//         Route::post('/movies/getremotemoviesrandom', 'getremotemoviesrandom');
//         Route::post('/movies/getremotemoviesname', 'getremotemoviesname');
//         Route::post('/movies/addmovie', 'addmovie');
//         Route::post('/movies/deletemovies', 'deletemovie');
//         Route::post('/series/addserie', 'addserie');
//         Route::post('/series/deletserie', 'deleteserie');
//         Route::post('/games/addgame', 'addgame');
//         Route::post('/games/deletegame', 'deletegame');
//     });
// });

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
Route::post('/movies/addmovie', [ItemController::class, 'addmovie'])->middleware('auth:sanctum');
Route::post('/movies/deletemovie', [ItemController::class, 'deletemovie'])->middleware('auth:sanctum');
Route::post('/movies/updatemovie', [ItemController::class, 'updatemovie'])->middleware('auth:sanctum');
Route::post('/series/getseries', [ItemController::class, 'getseries']);
Route::post('/series/addserie', [ItemController::class, 'addserie'])->middleware('auth:sanctum');
Route::post('/series/deletserie', [ItemController::class, 'deleteserie'])->middleware('auth:sanctum');
Route::post('/games/getgames', [ItemController::class, 'getgames']);
Route::post('/games/addgame', [ItemController::class, 'addgame'])->middleware('auth:sanctum');
Route::post('/games/deletegame', [ItemController::class, 'deletegame'])->middleware('auth:sanctum');
Route::resource('peliculas', PeliculaController::class);
Route::resource('series', SerieController::class);
Route::resource('juegos', JuegoController::class);
