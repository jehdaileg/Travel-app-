<?php

use App\Http\Controllers\API\ContinentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Continents

/*Route::get('/continents', [ContinentController::class, 'index']);

Route::delete('/continents/{continent}', [ContinentController::class, 'destroy']);

Route::post('/continents', [ContinentController::class, 'store']); */

Route::apiResource('/continents', ContinentController::class);
