<?php
// Dashboardf
//Route::get('dashboard', 'AdminController@index')->name('dashboard.index');
Route::resource('/dashboard/users','UserController');
Route::get('/dashboard/users/p/{user}', 'UserController@view')->name('users.view');
Route::get('/dashboard/users/t/trash', 'UserController@index')->name('users.trash');
Route::post('/dashboard/users_restore/{id}', 'UserController@restore')->name('users.restore');
