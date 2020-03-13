<?php

use Illuminate\Http\Request;

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

Route::get('v1/faqs','QuestionController@getFaqs');
Route::get('v1/states','StateController@getStates');
Route::get('v1/{id}/locations','LocationController@getLocations');
Route::get('v1/locations/{id}','LocationController@getLocation');
