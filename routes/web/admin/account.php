<?php

Route::group(['namespace' => 'Partial'], function(){

    Route::get('/dashboard/account/profile', 'AccountController@index')->name('admin.account');
    Route::get('/dashboard/profile/{username}', 'AccountController@show')->name('admin.view');
    Route::get('/api/dashboard/profile/{username}', 'AccountController@userShow');
    Route::get('/dashboard/user/update', 'AccountController@edit')->name('admin.edit_profile');
});
