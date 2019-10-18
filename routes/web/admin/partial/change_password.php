<?php

//Change Password Route
Route::get('dashboard/myprofile/change_password/', 'ChangePasswordController@showChangePasswordForm')->name('admin.change_password');
Route::put('change_password', 'ChangePasswordController@changePassword');

