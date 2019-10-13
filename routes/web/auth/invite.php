<?php

// Admin Invitation
Route::get('invite', 'AdmininviteController@invite')->name('invite');
Route::post('user/invite', 'AdmininviteController@process')->name('process');

// {token} is a required parameter that will be exposed to us in the controller method
Route::get('user/accept/{token}', 'AdmininviteController@accept')->name('accept');
