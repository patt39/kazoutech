<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-14
 * Time: 02:28
 */

Route::get('/user/{user}', 'ProfileController@view')->name('api_profile.view');
