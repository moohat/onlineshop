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



Route::get('users','Api\UserController@users');
Route::get('user/{id}','Api\UserController@user');
Route::get('logout/{id}','Api\UserController@logout');

Route::post('auth/login','Api\UserController@login');
Route::post('auth/register','Api\UserController@register');