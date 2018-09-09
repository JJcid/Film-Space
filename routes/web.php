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

Route::get('/set_language/{lang}', 'Controller@setLanguage')->name('set_language');
Route::get('login/{social_network_name}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{social_network_name}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/', 'HomeController@index')->name('home');
Route::group(['prefix' => 'films'], function(){
    Route::get('/{film}', 'FilmController@show')->name('films.detail');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(["prefix" => "subscriptions"], function () {
        Route::get('/plans', 'SubscriptionController@plans')
            ->name('subscriptions.plans');
        Route::get('/admin', 'SubscriptionController@admin')
            ->name('subscriptions.admin');
        Route::post('/process_subscription', 'SubscriptionController@processSubscription')
            ->name('subscriptions.process_subscription');
        Route::post('/resume', 'SubscriptionController@resume')->name('subscriptions.resume');
        Route::post('/cancel', 'SubscriptionController@cancel')->name('subscriptions.cancel');
    });
});


Auth::routes();

