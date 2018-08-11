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

Route::get('/set_laguage/{lang}', 'Controller@setLanguage')->name('set_language');
Route::get('login/{social_network_name}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{social_network_name}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'films'], function(){
    Route::get('/{film}', 'FilmController@show')->name('films.detail');
});
Route::get('/', function () {
    return redirect('/home');
});


Auth::routes();

