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
    return redirect('blog');
});

/* Content creation for blog */
Route::get('add','ContentController@create')->middleware('can:edit-content');
Route::post('add','ContentController@store')->middleware('can:edit-content');
Route::get('content','ContentController@index')->middleware('can:edit-content');
Route::get('edit/{id}','ContentController@edit')->middleware('can:edit-content');
Route::post('edit/{id}','ContentController@update')->middleware('can:edit-content');
Route::delete('{id}','ContentController@destroy')->middleware('can:edit-content');
Route::get('blog','ContentController@show');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
