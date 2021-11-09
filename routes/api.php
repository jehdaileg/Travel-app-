<?php

use App\Http\Controllers\API\ContinentController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\ProvinceController;
use App\Http\Controllers\API\MoveController;
use App\Http\Controllers\API\DATAS\MoveDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Continent;

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


//Countries 

Route::apiResource('/countries', CountryController::class);
/*
Route::get('/countries', [CountryController::class, 'index']);
Route::post('/countries', [CountryController::class, 'store']);
Route::delete('/countries/{country}', [CountryController::class, 'destroy']); */

//Provinces 

Route::apiResource('/provinces', ProvinceController::class);

/*

Route::get('/provinces', [ProvinceController::class, 'index']);
Route::delete('/provinces/{province}', [ProvinceController::class, 'destroy']);
Route::post('/provinces', [ProvinceController::class, 'store']);



*/

//Moves (about Travels)

Route::get('/moves/get-continents', [MoveDataController::class, 'continents']);
Route::get('/moves/{continent}/get-countries', [MoveDataController::class, 'countries']);
Route::get('/moves/{country}/get-provinces', [MoveDataController::class, 'provinces']);

Route::apiResource('/moves', MoveController::class);



