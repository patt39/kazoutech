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

Route::group(['namespace' => 'Admin'], function () {

    // Dashboard
    Route::get('dashboard', 'AdminController@index')->name('dashboard.index');
    Route::resource('/dashboard/users','UserController');
    Route::get('/dashboard/users/p/{user}', 'UserController@view')->name('users.view');

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

        //Notes administrator Route
        Route::resource('/dashboard/notes', 'NoteController');
        Route::get('/dashboard/active_notes/{id}', 'NoteController@active')->name('active_notes');
        Route::get('/dashboard/disable_notes/{id}', 'NoteController@disable')->name('disable_notes');

        //Route Following
        Route::post('user/follow/{id}', 'FollowerController@store')->name('user.follow');
        Route::get('dashboard/users/p/{username}/followers', 'FollowerController@followers')->name('follower.view');
        Route::get('dashboard/users/p/{username}/followings', 'FollowerController@following')->name('following.view');
        Route::get('followers/{username}', 'FollowerController@GetFollowersByUser');
        Route::get('followings/{username}', 'FollowerController@GetFollowingsByUser');

        //Notes administrator Route
        Route::resource('/dashboard/tasks', 'TaskController');
        Route::get('/api/dashboard/tasks/u/{username}', 'TaskController@usertask');
        Route::put('/dashboard/update_progress_tasks/{id}', 'TaskController@updateProgress');
        Route::put('/dashboard/update_description_tasks/{id}', 'TaskController@updateDescription');
        Route::get('/dashboard/tasks/u/{username}', 'TaskController@view')->name('tasks.view');

        //Admin Route Diplomas
        Route::resource('dashboard/diplomas', 'DiplomaController');
        Route::get('/dashboard/active_diplomas/{id}', 'DiplomaController@active')->name('active_diplomas');
        Route::get('/dashboard/disable_diplomas/{id}', 'DiplomaController@disable')->name('disable_diplomas');


    });

    //All Route Pages
    Route::group(['namespace' => 'Page'], function () {

        //Admin Route Abouts
        Route::resource('dashboard/abouts', 'AboutController');
        Route::get('/dashboard/active_abouts/{id}', 'AboutController@active')->name('active_abouts');
        Route::get('/dashboard/disable_abouts/{id}', 'AboutController@disable')->name('disable_abouts');

         //Admin Route Abouts
         Route::resource('dashboard/registrations', 'HowregisterController');
         Route::get('/dashboard/active_registrations/{id}', 'HowregisterController@active')->name('active_registrations');
         Route::get('/dashboard/disable_registrations/{id}', 'HowregisterController@disable')->name('disable_registrations');
 
        //Testimonials Route
        Route::resource('/dashboard/testimonials', 'TestimonialController');
        Route::get('/dashboard/testimonials/tm/{testimonial}', 'TestimonialController@vector')->name('testimonials.view');
        Route::get('/dashboard/testimonials/view/{slug}', 'TestimonialController@view');
        Route::get('/dashboard/active_testimonials/{id}', 'TestimonialController@active');
        Route::get('/dashboard/disable_testimonials/{id}', 'TestimonialController@disable');

    });

    Route::group(['namespace' => 'Info'], function () {
    
        //Terms & Conditions Routes
        Route::resource('/dashboard/conditions', 'ConditionController');
        Route::get('/dashboard/conditions/lm/{condition}', 'ConditionController@vector')->name('conditions.view');
        Route::get('/dashboard/conditions/view/{slug}', 'ConditionController@view');
        Route::get('/dashboard/unactive_condition/{id}', 'ConditionController@unactive_condition');
        Route::get('/dashboard/active_condition/{id}', 'ConditionController@active_condition');
    
        //Legal Notice Route
        Route::resource('/dashboard/legal_notice', 'LegalnoticeController');
        Route::get('/dashboard/legal_notice/lm/{id}', 'LegalnoticeController@vector')->name('legalnotice.view');
        Route::get('/dashboard/legal_notice/view/{id}', 'LegalnoticeController@view');
        Route::get('/dashboard/active_legal_notice/{id}', 'LegalnoticeController@active');
        Route::get('/dashboard/disable_legal_notice/{id}', 'LegalnoticeController@disable');
    
        //Policy & Privacy Route
        Route::resource('/dashboard/policy_privacy', 'PolicyprivacyController');
        Route::get('/dashboard/policy_privacy/lm/{id}', 'PolicyprivacyController@vector')->name('policy_privacy.view');
        Route::get('/dashboard/policy_privacy/view/{id}', 'PolicyprivacyController@view');
        Route::get('/dashboard/active_policy_privacy/{id}', 'PolicyprivacyController@active');
        Route::get('/dashboard/disable_policy_privacy/{id}', 'PolicyprivacyController@disable');
    
        //Licence Site Route
        Route::resource('/dashboard/licence_site', 'LicencesiteController');
        Route::get('/dashboard/licence_site/lm/{id}', 'LicencesiteController@vector')->name('licence_site.view');
        Route::get('/dashboard/licence_site/view/{id}', 'LicencesiteController@view');
        Route::get('/dashboard/active_licence_site/{id}', 'LicencesiteController@active');
        Route::get('/dashboard/disable_licence_site/{id}', 'LicencesiteController@disable');

    });

});

Route::group(['namespace' => 'User'], function () {

    //Admin Route contacts
    Route::resource('dashboard/contacts', 'ContactController');
    Route::get('dashboard/contacts/msg/{contact}', 'ContactController@contact')->name('contacts.view');
    Route::get('dashboard/contacts/view/{slug}', 'ContactController@view');
    Route::get('/dashboard/contacts/red_confirm/{id}', 'ContactController@active');
    Route::get('/dashboard/contacts/discard_red/{id}', 'ContactController@disable');

    //User Route Contact
    Route::get('/c/contact', 'ContactController@contatPage')->name('contact_cm');
    Route::post('contact-cm/save', 'ContactController@store');

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
