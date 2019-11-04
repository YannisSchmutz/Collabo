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
Route::get('home', 'PagesController@index');
// ***** Projects *****
Route::get('projects', 'ProjectsController@projects')->name('projects');
Route::get('projects/{id}/detail', 'ProjectsController@detail');
// ***** Profile *****
Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('profile/editCaption', 'ProfileController@editCaption');
Route::post('profile/editPitchbox', 'ProfileController@editPitchbox');
// ***** Community *****
Route::get('community', 'CommunityController@index')->name('community');
Route::get('searchProject', 'CommunityController@searchProject')->name('searchProject');

Route::get('swipe', 'PagesController@index')->name('swipe');
Route::get('inbox', 'PagesController@index')->name('inbox');
Route::get('settings', 'PagesController@index')->name('settings');

Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);
    return redirect('profile');
})->name('welcome');

Auth::routes();

