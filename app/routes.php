<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'ParkingController@index');

/*
|--------------------------------------------------------------------------
| API Application Routes
|--------------------------------------------------------------------------
| Prefix api
*/
Route::group(array('prefix' => 'api'), function()
{
	Route::resource('parking', 'ApiParkingController', ['only' => ['index']]);
});

Route::group(array('prefix' => 'parking'), function()
{
	Route::post('file', array('as' => 'parking.file', 'uses' => 'ParkingController@file'));	
});
Route::resource('parking', 'ParkingController');
