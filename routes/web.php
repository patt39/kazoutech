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


Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index')->name('home');


/** Dashboard */
require(__DIR__ . DIRECTORY_SEPARATOR . 'web' .DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'index.php');

/** Auth */
Auth::routes(['verify' => true]);
require(__DIR__ . DIRECTORY_SEPARATOR . 'web' .DIRECTORY_SEPARATOR . 'auth' . DIRECTORY_SEPARATOR . 'index.php');

/** User */
require(__DIR__ . DIRECTORY_SEPARATOR . 'web' .DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'index.php');

Route::group(['namespace' => 'Admin'], function () {


    //Route Administrator
    Route::resource('/dashboard/administrators','AdministratorController');
    Route::get('/dashboard/active_administrators/{id}', 'OccupationController@active')->name('active_occupations');
    Route::get('/dashboard/disable_occupations/{id}', 'OccupationController@disable')->name('disable_occupations');



    //All Route Partials
    Route::group(['namespace' => 'Partial'], function () {

        // Admin Route categories
        Route::resource('/dashboard/categories', 'CategoryController');
        Route::get('/dashboard/active_categories/{id}', 'CategoryController@active')->name('active_categories');
        Route::get('/dashboard/disable_categories/{id}', 'CategoryController@disable')->name('disable_categories');



        Route::get('/@{username}', 'AccountController@profileView')->name('profile.view');
        Route::get('/profile/edit', 'AccountController@profileEdit')->name('profile.edit');
        Route::put('/user/update', 'AccountController@update');

        Route::post('auth/register', 'AccountController@register');
        Route::get('api/{username}', 'AccountController@view');
        Route::get('api/account/user', 'AccountController@user');
        Route::get('api/account/profile', 'AccountController@userEdit');



    });

});

Route::group(['namespace' => 'User'], function () {


    //User Route technicians
    Route::get('profile/t/{technician}','TechnicianController@profile')->name('technicians.profile');
    Route::get('profile/t/{technician}/edit','TechnicianController@edit');


    Route::resource('dashboard/messages', 'MessageController');
    Route::get('/dashboard/messages/view/{slug}', 'MessageController@view');
    Route::get('/dashboard/messages/m/send', 'MessageController@send')->name('messages.send');
    Route::get('/messages/red_confirm/{id}', 'MessageController@active');
    Route::get('/dashboard/user/search', 'MessageController@user');
    Route::get('/messages/discard_red/{slug}', 'MessageController@disable');

    Route::resource('dashboard/mails', 'MailController');



    Route::get('dashboard/chat', 'MessageController@chat')->name('messages.chat');
});

Route::resource('/dashboard/tests', 'DownloadcvController');
