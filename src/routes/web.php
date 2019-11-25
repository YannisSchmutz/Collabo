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
    Route::get('profile/{id}/detail', 'ProfileController@detail')
        ->where(['id' => $validateId, 'language' => $validateLangage])
        ->name('profiledetails');

Route::post('profile/editCaption', 'ProfileController@editCaption')
    ->where(['language' => $validateLangage])
    ->name('profileEditCaption');

Route::get('u2pcollab/{projectid}', 'ProjectsController@collab')
    ->where(['projectid' => $validateId, 'language' => $validateLangage])
    ->name('u2pcollab');

Route::get('p2ucollab/{userid}/{projectid}', 'ProfileController@collab')
    ->where(['projectid' => $validateId, 'userid' => $validateId,  'language' => $validateLangage])
    ->name('p2ucollab_selected');

Route::get('p2ucollab/{userid}', 'ProfileController@collablist')
    ->where(['userid' => $validateId, 'language' => $validateLangage])
    ->name('p2ucollab');


Route::post('profile/editPitchbox', 'ProfileController@editPitchbox')->name('profileEditPitchbox');
Route::post('profile/addInterest', 'ProfileController@addInterest')->name('profileAddInterest');
Route::post('profile/removeInterest', 'ProfileController@removeInterest')->name('profileRemoveInterest');


// ***** Community *****
Route::get('community', 'CommunityController@index')->name('community');
Route::get('searchProject', 'CommunityController@searchProject')->name('searchProject');
Route::get('searchProfile', 'CommunityController@searchProfile')->name('searchProfile');

// ***** Inbox *****
Route::get('inbox', 'InboxController@index')->name('inbox');
Route::get('inbox/accu2p/{userid}/{projectid}', 'InboxController@user_accept_project')
    ->where(['userid' => $validateId, 'language' => $validateLangage, 'projectid' => $validateId])
    ->name('user_accept_project');
Route::get('inbox/decu2p/{userid}/{projectid}', 'InboxController@project_accept_user')
    ->where(['userid' => $validateId, 'language' => $validateLangage, 'projectid' => $validateId])
    ->name('project_accept_user');
Route::get('inbox/accp2u/{userid}/{projectid}', 'InboxController@user_decline_project')
    ->where(['userid' => $validateId, 'language' => $validateLangage, 'projectid' => $validateId])
    ->name('user_decline_project');
Route::get('inbox/decp2u/{userid}/{projectid}', 'InboxController@project_decline_user')
    ->where(['userid' => $validateId, 'language' => $validateLangage, 'projectid' => $validateId])
    ->name('project_decline_user');

Route::get('swipe', 'PagesController@index')->name('swipe');
Route::get('inbox', 'InboxController@index')->name('inbox');
Route::get('settings', 'PagesController@index')->name('settings');



Auth::routes();
});

