<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['prefix' => 'login', 'middleware' => 'App\Http\Middleware\CheckLogedIn'], function(){ 
    Route::get('/', 'App\Http\Controllers\Auth\LoginController@getLogin');
    Route::post('/', 'App\Http\Controllers\Auth\LoginController@postLogin');
  });

Route::get('logout', 'App\Http\Controllers\HomeController@getLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'App\Http\Middleware\CheckLogedOut'], function(){
    Route::get('home', 'App\Http\Controllers\HomeController@getHome');
   
    Route::group(['prefix' => 'category'], function(){
        Route::get('/', 'App\Http\Controllers\CategoryController@getCate');
        Route::post('/', 'App\Http\Controllers\CategoryController@postCate');

        Route::get('edit/{id}', 'App\Http\Controllers\CategoryController@getEditCate');
        Route::post('edit/{id}', 'App\Http\Controllers\CategoryController@postEditCate');

        Route::get('delete/{id}', 'App\Http\Controllers\CategoryController@getDeleteCate');
    });

    Route::group(['prefix' => 'product'], function(){
        Route::get('/', 'App\Http\Controllers\ProductController@getProduct');

        Route::get('add', 'App\Http\Controllers\ProductController@getAddProduct');
        Route::post('add', 'App\Http\Controllers\ProductController@postAddProduct');

        Route::get('edit/{id}', 'App\Http\Controllers\ProductController@getEditProduct');
        Route::post('edit/{id}', 'App\Http\Controllers\ProductController@postEditProduct');

        Route::get('delete/{id}', 'App\Http\Controllers\ProductController@getDeleteProduct');
    });

});
