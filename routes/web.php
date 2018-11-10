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

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['prefix' => 'admin', 'middleware'=> ['auth']], function(){

Route::get('/users', 'web\UserController@users')->name('users');
Route::get('/products', 'web\ProductsController@index')->name('products.index');
Route::post('/products', 'web\ProductsController@store')->name('products.store');

});

