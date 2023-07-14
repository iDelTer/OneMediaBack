<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('api')->group(function () {
    Route::post('/login', function () {
        return response()->json(['mensaje' => '¡Hola, mundo!'], 200);
    });
    Route::post('/account', function (Request $request) {
        $sessionToken = $request->input('sessionId');
        return response()->json(['mensaje' => "Tu id es: $sessionToken"]);
    });
});
