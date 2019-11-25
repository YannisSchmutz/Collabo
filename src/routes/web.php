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


Route::redirect('/', '/en');

Route::group(['prefix' => '{language}'], function () {
    $validateLangage = '[a-z]{2,8}';
    $validateId = '[0-9]+';

Route::get ('/', 'PagesController@index')->name('main');
Route::get('home', 'PagesController@index');


// ***** Projects *****
Route::get('projects', 'ProjectsController@projects')->name('projects');

Route::get('project/create', 'ProjectsController@create')->name('createProject');
Route::post('project/store', 'ProjectsController@store')->name('storeProject');

Route::get('projects/{id}/detail', 'ProjectsController@detail')
    ->where(['id' => $validateId, 'language' => $validateLangage])
    ->name('projectsdetails');

Route::post('project/{id}/detail/addInterest', 'ProjectsController@addInterest')
    ->where(['id' => $validateId, 'language' => $validateLangage])
    ->name('projectAddInterest');

Route::post('project/{id}/detail/removeInterest', 'ProjectsController@removeInterest')
    ->where(['id' => $validateId, 'language' => $validateLangage])
    ->name('projectRemoveInterest');

Route::post('project/{id}/detail/editCaption', 'ProjectsController@editCaption')
    ->where(['id' => $validateId, 'language' => $validateLangage])
    ->name('projectEditCaption');

Route::post('project/{id}/detail/editPitchbox', 'ProjectsController@editPitchbox')
    ->where(['id' => $validateId, 'language' => $validateLangage])
    ->name('projectEditPitchbox');

Route::post('project/{id}/detail/editDescriptionBox', 'ProjectsController@editDescriptionBox')
    ->where(['id' => $validateId, 'language' => $validateLangage])
    ->name('projectEditDescriptionBox');

Route::get('projects/{id}/unsubscribe', 'ProjectsController@unsubscribe')
    ->where(['id' => $validateId, 'language' => $validateLangage])
    ->name('projectunsubscribe');

// ***** Profile *****
Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('profile/editCaption', 'ProfileController@editCaption')
    ->where(['language' => $validateLangage])
    ->name('profileEditCaption');

Route::post('profile/editPitchbox', 'ProfileController@editPitchbox')->name('profileEditPitchbox');
Route::post('profile/addInterest', 'ProfileController@addInterest')->name('profileAddInterest');
Route::post('profile/removeInterest', 'ProfileController@removeInterest')->name('profileRemoveInterest');


// ***** Community *****
Route::get('community', 'CommunityController@index')->name('community');
Route::get('searchProject', 'CommunityController@searchProject')->name('searchProject');
Route::get('searchProfile', 'CommunityController@searchProfile')->name('searchProfile');

Route::get('swipe', 'PagesController@index')->name('swipe');
Route::get('inbox', 'PagesController@index')->name('inbox');
Route::get('settings', 'PagesController@index')->name('settings');


Auth::routes();
});

