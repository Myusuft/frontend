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

Route::post('/property/type/store', 'API\PropertyTypeManagementController@store');
Route::get('/property/type', 'API\PropertyTypeManagementController@index');
Route::get('/property/type/{id?}', 'API\PropertyTypeManagementController@show');
Route::put('/property/type/update', 'API\PropertyTypeManagementController@update');
Route::delete('/property/type/{id?}', 'API\PropertyTypeManagementController@destroy');