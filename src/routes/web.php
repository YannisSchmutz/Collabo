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
Route::get('projects/create', 'ProjectsController@create');
Route::post('projects/store', 'ProjectsController@store');
Route::get('projects/{id}/detail', 'ProjectsController@detail');
Route::post('projects/{id}/detail/addInterest', 'ProjectsController@addInterest');
Route::post('projects/{id}/detail/editCaption', 'ProjectsController@editCaption');
Route::post('projects/{id}/detail/editPitchbox', 'ProjectsController@editPitchbox');
Route::post('projects/{id}/detail/editDescriptionBox', 'ProjectsController@editDescriptionBox');
// ***** Profile *****
Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('profile/editCaption', 'ProfileController@editCaption');
Route::post('profile/editPitchbox', 'ProfileController@editPitchbox');
Route::post('profile/addInterest', 'ProfileController@addInterest');
Route::get('swipe', 'PagesController@index')->name('swipe');
Route::get('community', 'PagesController@index')->name('community');
Route::get('inbox', 'PagesController@index')->name('inbox');
Route::get('settings', 'PagesController@index')->name('settings');

Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);
    return redirect('profile');
})->name('welcome');

Auth::routes();

