<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    //the prefix in all route is admin => provider admin provider
    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin' ,'prefix'=>'admin'], function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');

        Route::group(['prefix' => 'settings'], function () {
            Route::get('/shopping-methods/{type}', 'SettingsController@editShoppingMethods')->name('edit.shopping.methods');
            Route::put('/shopping-methods/{id}', 'SettingsController@UpdateShoppingMethods')->name('update.shopping.methods');
        });
    });

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin','prefix'=>'admin'], function () {
        Route::get('/login', 'LoginController@login')->name('admin.login');
        Route::post('/login', 'LoginController@postLogin')->name('admin.post.login');
    });

});

