<?php

Route::group(['namespace' => 'Partial'], function(){


    Route::get('/profile/edit', 'AccountController@profileEdit')->name('profile.edit');
    Route::put('/user/update', 'AccountController@update');

    Route::post('auth/register', 'AccountController@register');
    Route::get('api/account/user', 'AccountController@user');
    Route::get('api/account/profile', 'AccountController@userEdit')->name('api.account_profile');


    Route::get('/dashboard/myprofile', 'AccountController@index')->name('admin.account');
    Route::get('/dashboard/myprofile/p/{username}', 'AccountController@show')->name('admin.view');
    Route::get('/api/dashboard/profile/{username}', 'AccountController@userShow');
    Route::get('/dashboard/myprofile/update', 'AccountController@edit')->name('admin.edit_profile');

});
