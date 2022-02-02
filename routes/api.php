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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/power_supply/store', 'API\PowerSupplyManagementController@store');
Route::get('/power_supply', 'API\PowerSupplyManagementController@index');
Route::get('/power_supply/{id?}', 'API\PowerSupplyManagementController@show');
Route::put('/power_supply/update', 'API\PowerSupplyManagementController@update');
Route::delete('/power_supply/{id?}', 'API\PowerSupplyManagementController@destroy');