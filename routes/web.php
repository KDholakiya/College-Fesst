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

Route::get('/','PagesController@index');//index page
Route::get('/about','PagesController@about');//about page
Route::get('/Search/{data?}', 'PagesController@search')->where('data', '(.*)');//search query
Route::get('/event/{data?}', 'PagesController@gallery')->where('data', '(.*)');//gallery page
Route::resource('Data', 'DataController');
