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
    return view('welcome');
});

/* Content creation for blog */
Route::get('add','ContentController@create');
Route::post('add','ContentController@store');
Route::get('content','ContentController@index');
Route::get('edit/{id}','ContentController@edit');
Route::post('edit/{id}','ContentController@update');
Route::delete('{id}','ContentController@destroy');
Route::get('blog','ContentController@show');