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