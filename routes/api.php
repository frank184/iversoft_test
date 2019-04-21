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

Route::get('/users', 'Api\UsersController@index');
Route::get('/users/{user}', 'Api\UsersController@show');
Route::post('/users', 'Api\UsersController@store');
Route::put('/users/{user}', 'Api\UsersController@update');
Route::delete('/users/{user}', 'Api\UsersController@destroy');
