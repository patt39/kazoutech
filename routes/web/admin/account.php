<?php

Route::group(['namespace' => 'Partial'], function(){


    Route::get('/profile/edit', 'AccountController@profileEdit')->name('profile.edit');
    Route::put('/user/update', 'AccountController@update');

    Route::post('auth/register', 'AccountController@register');
    Route::get('api/account/user', 'AccountController@user');
    Route::get('api/account/profile', 'AccountController@userEdit');


    Route::get('/dashboard/account/profile', 'AccountController@index')->name('admin.account');
    Route::get('/dashboard/profile/{username}', 'AccountController@show')->name('admin.view');
    Route::get('/api/dashboard/profile/{username}', 'AccountController@userShow');
    Route::get('/dashboard/user/update', 'AccountController@edit')->name('admin.edit_profile');

});
