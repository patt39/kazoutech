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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Auth'], function () {

    // Admin Invitation
    Route::get('invite', 'AdmininviteController@invite')->name('invite');
    Route::post('invite', 'AdmininviteController@process')->name('process');

    // {token} is a required parameter that will be exposed to us in the controller method
    Route::get('accept/{token}', 'AdmininviteController@accept')->name('accept');

});

/** Admin */
require(__DIR__ . DIRECTORY_SEPARATOR . 'web' .DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'index.php');

/** User */
require(__DIR__ . DIRECTORY_SEPARATOR . 'web' .DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'index.php');

Route::group(['namespace' => 'Admin'], function () {

    // Dashboardf
    //Route::get('dashboard', 'AdminController@index')->name('dashboard.index');
    Route::resource('/dashboard/users','UserController');
    Route::get('/dashboard/users/p/{user}', 'UserController@view')->name('users.view');

    //Route Administrator
    Route::resource('/dashboard/administrators','AdministratorController');
    Route::get('/dashboard/active_administrators/{id}', 'OccupationController@active')->name('active_occupations');
    Route::get('/dashboard/disable_occupations/{id}', 'OccupationController@disable')->name('disable_occupations');



    //All Route Partials
    Route::group(['namespace' => 'Partial'], function () {

        // Admin Route activities
        Route::get('/dashboard/activities', 'ActivitylogController@index')->name('activities.index');
        Route::get('/dashboard/api/activities', 'ActivitylogController@api');

         // Admin Route links
         Route::get('/dashboard/links', 'LinkController@index')->name('links.index');
         Route::get('/dashboard/api/links', 'LinkController@api');

        // Admin Route categories
        Route::resource('/dashboard/categories', 'CategoryController');
        Route::get('/dashboard/active_categories/{id}', 'CategoryController@active')->name('active_categories');
        Route::get('/dashboard/disable_categories/{id}', 'CategoryController@disable')->name('disable_categories');




        // Admin Route country
        Route::resource('/dashboard/countries', 'CountryController');

        //Admin Route city
        Route::resource('/dashboard/cities', 'CityController');
        Route::get('/dashboard/active_cities/{id}', 'CityController@active')->name('active_cities');
        Route::get('/dashboard/disable_cities/{id}', 'CityController@disable')->name('disable_cities');


        Route::get('/{username}', 'AccountController@profileView')->name('profile.view');
        Route::get('/profile/edit', 'AccountController@profileEdit')->name('profile.edit');
        Route::put('/user/update', 'AccountController@update');

        Route::post('auth/register', 'AccountController@register');
        Route::get('api/{username}', 'AccountController@view');
        Route::get('api/account/user', 'AccountController@user');
        Route::get('api/account/profile', 'AccountController@userEdit');


        //Change Password Route
        Route::get('dashboard/user/password/change', 'ChangePasswordController@showChangePasswordForm')->name('admin.change_password');
        Route::put('change_password', 'ChangePasswordController@changePassword');
        //Reset Password Route
        Route::get('dashboard/user/password/reset', 'ChangePasswordController@showResetPasswordForm')->name('admin.reset_password');



        //Route Following
        Route::post('user/follow/{id}', 'FollowerController@store')->name('user.follow');
        Route::get('dashboard/users/p/{username}/followers', 'FollowerController@followers')->name('follower.view');
        Route::get('dashboard/users/p/{username}/followings', 'FollowerController@following')->name('following.view');
        Route::get('followers/{username}', 'FollowerController@GetFollowersByUser');
        Route::get('followings/{username}', 'FollowerController@GetFollowingsByUser');



    });

    //All Route Pages
    Route::group(['namespace' => 'Page'], function () {



         //Admin Route Abouts
         Route::resource('dashboard/registrations', 'HowregisterController');
         Route::get('/dashboard/active_registrations/{id}', 'HowregisterController@active')->name('active_registrations');
         Route::get('/dashboard/disable_registrations/{id}', 'HowregisterController@disable')->name('disable_registrations');

    });

});

Route::group(['namespace' => 'User'], function () {


    //Admin Route technicians
    Route::resource('dashboard/technicians','TechnicianController');
    Route::get('dashboard/technicians/u/{technician}','TechnicianController@technician')->name('technicians.view');
    Route::get('dashboard/technicians/c/{city}', 'TechnicianController@bycity')->name('city.technician');
    Route::get('dashboard/technicians/o/{occupation}', 'TechnicianController@byoccupation')->name('occupation.technician');

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
