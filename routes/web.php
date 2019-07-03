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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Auth'], function () {

    // Admin Invitation
    Route::get('invite', 'AdmininviteController@invite')->name('invite');
    Route::post('invite', 'AdmininviteController@process')->name('process');

    // {token} is a required parameter that will be exposed to us in the controller method
    Route::get('accept/{token}', 'AdmininviteController@accept')->name('accept');

});

Route::group(['namespace' => 'Admin'], function () {

    // Dashboard
    Route::get('dashboard', 'AdminController@index')->name('dashboard.index');
    Route::resource('/dashboard/users','UserController');
    Route::get('/dashboard/users/profile/{username}', 'UserController@view')->name('users.view');
    Route::get('/users/profile/{username}', 'UserController@userShow');

    //Route Administrator
    Route::resource('/dashboard/administrators','AdministratorController');
    Route::get('/dashboard/active_administrators/{id}', 'OccupationController@active')->name('active_occupations');
    Route::get('/dashboard/disable_occupations/{id}', 'OccupationController@disable')->name('disable_occupations');

    //Route Occupation
    Route::resource('/dashboard/occupations','OccupationController');
    Route::get('/dashboard/active_occupations/{id}', 'OccupationController@active')->name('active_occupations');
    Route::get('/dashboard/disable_occupations/{id}', 'OccupationController@disable')->name('disable_occupations');

    //Route Permission
    Route::resource('/dashboard/permissions', 'PermissionController');

    //Roles Route
    Route::resource('/dashboard/roles', 'RoleController');

    //Route Faq
    Route::resource('/dashboard/faqs','FaqController');
    Route::get('/dashboard/active_faqs/{id}', 'FaqController@active')->name('active_faqs');
    Route::get('/dashboard/disable_faqs/{id}', 'FaqController@disable')->name('disable_faqs');

    //Route Faq
    Route::resource('/dashboard/faqs','FaqController');
    Route::get('/dashboard/active_faqs/{id}', 'FaqController@active')->name('active_faqs');
    Route::get('/dashboard/disable_faqs/{id}', 'FaqController@disable')->name('disable_faqs');

    Route::group(['namespace' => 'Partial'], function () {

        // Admin Route categories
        Route::resource('/dashboard/categories', 'CategoryController');
        Route::get('/dashboard/active_categories/{id}', 'CategoryController@active')->name('active_categories');
        Route::get('/dashboard/disable_categories/{id}', 'CategoryController@disable')->name('disable_categories');

        // Admin Route categoryfaqs
        Route::resource('/dashboard/category-faqs', 'CategoryfaqController');
        Route::get('/dashboard/active_category-faqs/{id}', 'CategoryfaqController@active')->name('active_category-faqs');
        Route::get('/dashboard/disable_category-faqs/{id}', 'CategoryfaqController@disable')->name('disable_category-faqs');

        // Admin Route tags
        Route::resource('/dashboard/tags', 'TagController');
        Route::get('/dashboard/tags/show/{tag}', 'TagController@view')->name('tags.view');
        Route::get('/dashboard/tags/api/{slug}', 'TagController@getview');
        Route::get('/dashboard/active_tags/{id}', 'TagController@active')->name('active_tags');
        Route::get('/dashboard/disable_tags/{id}', 'TagController@disable')->name('disable_tags');

        //Admin Route Abouts
        Route::resource('dashboard/abouts', 'AboutController');
        Route::get('/dashboard/active_abouts/{id}', 'AboutController@active')->name('active_abouts');
        Route::get('/dashboard/disable_abouts/{id}', 'AboutController@disable')->name('disable_abouts');

        //Admin Route colors
        Route::resource('dashboard/colors', 'ColorController');
        Route::get('/dashboard/active_color/{id}', 'ColorController@active')->name('active_color');
        Route::get('/dashboard/disable_color/{id}', 'ColorController@disable')->name('disable_color');

        // Admin Route country
        Route::resource('/dashboard/countries', 'CountryController');

        //Admin Route city
        Route::resource('/dashboard/cities', 'CityController');
        Route::get('/dashboard/active_cities/{id}', 'CityController@active')->name('active_cities');
        Route::get('/dashboard/disable_cities/{id}', 'CityController@disable')->name('disable_cities');

        Route::get('/dashboard/account/profile', 'AccountController@index')->name('admin.account');
        Route::get('/dashboard/profile/{username}', 'AccountController@show')->name('admin.view');
        Route::get('/api/dashboard/profile/{username}', 'AccountController@userShow');
        Route::get('/dashboard/user/update', 'AccountController@edit')->name('admin.edit_profile');
        Route::put('/user/update', 'AccountController@update');

        Route::get('api/account/user', 'AccountController@user');
        Route::get('api/account/profile', 'AccountController@userEdit');


        //Change Password Route
        Route::get('dashboard/user/change_password', 'ChangePasswordController@showChangePasswordForm')->name('admin.change_password');
        Route::put('change_password', 'ChangePasswordController@changePassword');

        //Notes administrator Route
        Route::resource('/dashboard/notes', 'NoteController');
        Route::get('/dashboard/active_notes/{id}', 'NoteController@active')->name('active_notes');
        Route::get('/dashboard/disable_notes/{id}', 'NoteController@disable')->name('disable_notes');

        //Route Task
        //Notes administrator Route
        Route::resource('/dashboard/tasks', 'TaskController');
        Route::put('/dashboard/update_progress_tasks/{id}', 'TaskController@updateProgress');
        Route::put('/dashboard/update_description_tasks/{id}', 'TaskController@updateDescription');
        Route::get('/dashboard/tasks/u/{username}', 'TaskController@view')->name('tasks.view');


    });

});

Route::group(['namespace' => 'User'], function () {

    //Admin Route contacts
    Route::resource('dashboard/contacts', 'ContactController');
    Route::get('dashboard/contacts/msg/{contact}', 'ContactController@contact')->name('contacts.view');
    Route::get('dashboard/contacts/view/{slug}', 'ContactController@view');
    Route::get('/dashboard/contacts/red_confirm/{id}', 'ContactController@active');
    Route::get('/dashboard/contacts/discard_red/{id}', 'ContactController@disable');


    Route::resource('dashboard/messages', 'MessageController');
    Route::get('/dashboard/messages/view/{slug}', 'MessageController@view');
    Route::get('/dashboard/messages/m/send', 'MessageController@send')->name('messages.send');
    Route::get('/messages/red_confirm/{id}', 'MessageController@active');
    Route::get('/dashboard/user/search', 'MessageController@user');
    Route::get('/messages/discard_red/{slug}', 'MessageController@disable');

    Route::resource('dashboard/mails', 'MailController');



    Route::get('dashboard/chat', 'MessageController@chat')->name('messages.chat');
});