<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-14
 * Time: 02:28
 */

Route::get('profiles/u/{id}','ProfileController@show')->name('profiles.show');
Route::put('profiles/{profile}','ProfileController@update');
Route::get('dashboard/p/{profile}/edit','ProfileController@edit')->name('admin.profiles_edit');