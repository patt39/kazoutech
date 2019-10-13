<?php

//Change Password Route
Route::get('dashboard/user/password/change', 'ChangePasswordController@showChangePasswordForm')->name('admin.change_password');
Route::put('change_password', 'ChangePasswordController@changePassword');
//Reset Password Route
Route::get('dashboard/user/password/reset', 'ChangePasswordController@showResetPasswordForm')->name('admin.reset_password');
