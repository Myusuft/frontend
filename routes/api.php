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

Route::post('/certificate/type/store', 'API\CertificateTypeManagementController@store');
Route::get('/certificate/type', 'API\CertificateTypeManagementController@index');
Route::get('/certificate/type/{id?}', 'API\CertificateTypeManagementController@show');
Route::put('/certificate/type/update', 'API\CertificateTypeManagementController@update');
Route::delete('/certificate/type/{id?}', 'API\CertificateTypeManagementController@destroy');

Route::post('/power_supply/store', 'API\PowerSupplyManagementController@store');
Route::get('/power_supply', 'API\PowerSupplyManagementController@index');
Route::get('/power_supply/{id?}', 'API\PowerSupplyManagementController@show');
Route::put('/power_supply/update', 'API\PowerSupplyManagementController@update');
Route::delete('/power_supply/{id?}', 'API\PowerSupplyManagementController@destroy');

Route::post('/listing/type/store', 'API\ListingTypeManagementController@store');
Route::get('/listing/type', 'API\ListingTypeManagementController@index');
Route::get('/listing/type/{id?}', 'API\ListingTypeManagementController@show');
Route::put('/listing/type/update', 'API\ListingTypeManagementController@update');
Route::delete('/listing/type/{id?}', 'API\ListingTypeManagementController@destroy');

Route::post('/property/type/store', 'API\PropertyTypeManagementController@store');
Route::get('/property/type', 'API\PropertyTypeManagementController@index');
Route::get('/property/type/{id?}', 'API\PropertyTypeManagementController@show');
Route::put('/property/type/update', 'API\PropertyTypeManagementController@update');
Route::delete('/property/type/{id?}', 'API\PropertyTypeManagementController@destroy');