<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('api')->group(function () {
//     Route::post('/', function () {
//         return response()->json(['mensaje' => '¡API!'], 200);
//     });
//     Route::post('/login', function () {
//         return response()->json(['mensaje' => '¡Hola, mundo!'], 200);
//     });
//     Route::post('/account', function (Request $request) {
//         $sessionToken = $request->input('sessionId');
//         return response()->json(['mensaje' => "Tu id es: $sessionToken"]);
//     });
// });

Route::get('api', function () {
    return response()
        ->header('Content-Type', 'text/json')
        ->json(['mensaje' => '¡API!'], 200);
});
