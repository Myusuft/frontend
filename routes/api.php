<?php

use App\Model\User;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return ["Role : ".$request->user()->getRoleNames(), $request->user()];
//     // return $request->user();    
// });
Route::middleware(['auth:api'])->get('/user', function (Request $request) {
    return ["Role : ".$request->user()->getRoleNames(), $request->user()];
    // return $request->user();    
});

Route::post('/auth/register', 'Auth\RegisterController');
Route::post('/auth/login', 'Auth\LoginController');
Route::post('/auth/logout', 'Auth\LoginController@logout')->middleware('auth:api');

Route::resource('/certificate/type', 'API\CertificateTypeManagementController',['except' => ['create','edit']]);
Route::resource('/power_supply', 'API\PowerSupplyManagementController',['except' => ['create','edit']]);
Route::resource('/listing/type', 'API\ListingTypeManagementController',['except' => ['create','edit']]);
Route::resource('/property/type', 'API\PropertyTypeManagementController',['except' => ['create','edit']]);
Route::resource('/developer/type', 'API\DeveloperTypeManagementController',['except' => ['create','edit']]);
Route::resource('/property/type', 'API\PropertyTypeManagementController',['except' => ['create','edit']]);
Route::resource('/agent/type', 'API\AgentTypeManagementController',['except' => ['create','edit']]);
Route::resource('/infrastructure/type', 'API\InfrastructureTypeManagementController',['except' => ['create','edit']]);
Route::resource('/facility/type', 'API\FacilityTypeManagementController',['except' => ['create','edit']]);
Route::resource('/advantage/type', 'API\AdvantageTypeManagementController',['except' => ['create','edit']]);