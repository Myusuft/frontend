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

Route::post('/developer/type/store', 'API\DeveloperTypeManagementController@store');
Route::get('/developer/type', 'API\DeveloperTypeManagementController@index');
Route::get('/developer/type/{id?}', 'API\DeveloperTypeManagementController@show');
Route::put('/developer/type/update', 'API\DeveloperTypeManagementController@update');
Route::delete('/developer/type/{id?}', 'API\DeveloperTypeManagementController@destroy');

Route::post('/property/type/store', 'API\PropertyTypeManagementController@store');
Route::get('/property/type', 'API\PropertyTypeManagementController@index');
Route::get('/property/type/{id?}', 'API\PropertyTypeManagementController@show');
Route::put('/property/type/update', 'API\PropertyTypeManagementController@update');
Route::delete('/property/type/{id?}', 'API\PropertyTypeManagementController@destroy');

Route::post('/agent/type/store', 'API\AgentTypeManagementController@store');
Route::get('/agent/type', 'API\AgentTypeManagementController@index');
Route::get('/agent/type/{id?}', 'API\AgentTypeManagementController@show');
Route::put('/agent/type/update', 'API\AgentTypeManagementController@update');
Route::delete('/agent/type/{id?}', 'API\AgentTypeManagementController@destroy');

Route::post('/infrastructure/type/store', 'API\InfrastructureTypeManagementController@store');
Route::get('/infrastructure/type', 'API\InfrastructureTypeManagementController@index');
Route::get('/infrastructure/type/{id?}', 'API\InfrastructureTypeManagementController@show');
Route::put('/infrastructure/type/update', 'API\InfrastructureTypeManagementController@update');
Route::delete('/infrastructure/type/{id?}', 'API\InfrastructureTypeManagementController@destroy');

Route::post('/facility/type/store', 'API\FacilityTypeManagementController@store');
Route::get('/facility/type', 'API\FacilityTypeManagementController@index');
Route::get('/facility/type/{id?}', 'API\FacilityTypeManagementController@show');
Route::put('/facility/type/update', 'API\FacilityTypeManagementController@update');
Route::delete('/facility/type/{id?}', 'API\FacilityTypeManagementController@destroy');

Route::post('/advantage/type/store', 'API\AdvantageTypeManagementController@store');
Route::get('/advantage/type', 'API\AdvantageTypeManagementController@index');
Route::get('/advantage/type/{id?}', 'API\AdvantageTypeManagementController@show');
Route::put('/advantage/type/update', 'API\AdvantageTypeManagementController@update');
Route::delete('/advantage/type/{id?}', 'API\AdvantageTypeManagementController@destroy');
