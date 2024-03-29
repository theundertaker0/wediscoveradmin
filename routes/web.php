<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (App::environment('development')) {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(["register"=>false]);


Route::group(['before' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users','UserController')->except(['show']);
    Route::resource('states','StateController');
    Route::resource('locations','LocationController');
    Route::resource('questions','QuestionController');
    Route::resource('definitions','DefinitionController');
});
