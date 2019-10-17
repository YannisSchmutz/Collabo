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

//Route::get('/', function () {
//    return view('index');
//});

Route::get ('/', 'PagesController@index');
Route::get('/home', 'PagesController@index');
Route::get('/profile', 'PagesController@index')->name('profile');
Route::get('/projects', 'PagesController@index')->name('projects');
Route::get('/swipe', 'PagesController@index')->name('swipe');
Route::get('/community', 'PagesController@index')->name('community');
Route::get('/inbox', 'PagesController@index')->name('inbox');
Route::get('/settings', 'PagesController@index')->name('settings');

Auth::routes();

