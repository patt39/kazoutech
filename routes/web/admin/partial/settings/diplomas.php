<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:28
 */

//Admin Route Diplomas
Route::resource('dashboard/diplomas', 'DiplomaController');
Route::get('/dashboard/active_diplomas/{id}', 'DiplomaController@active')->name('active_diplomas');
Route::get('/dashboard/disable_diplomas/{id}', 'DiplomaController@disable')->name('disable_diplomas');
