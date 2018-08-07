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

Route::get('/set_laguage/{lang}', 'Controller@setLamguage')->name('set_language');
Route::get('login/{social_network_name}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{social_network_name}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
