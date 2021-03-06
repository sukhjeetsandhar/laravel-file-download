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

Route::get('/', 'MainController@index');
Route::get('file/{file}/download', 'MainController@download');
Route::get('/upload', 'MainController@create');
Route::post('/upload', 'MainController@store')->name('file.upload');


// Temp File Upload

Route::get('temp/{temp}/download', 'TempController@download');
Route::get('temp/delete', 'TempController@destroy');
Route::post('/temp/upload', 'TempController@store')->name('temp.upload');
