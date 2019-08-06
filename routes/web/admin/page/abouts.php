<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:46
 */


Route::group(['namespace' => 'Page'], function(){

    //Admin Route Abouts
    Route::resource('dashboard/abouts', 'AboutController');
    Route::get('/dashboard/active_abouts/{id}', 'AboutController@active')->name('active_abouts');
    Route::get('/dashboard/disable_abouts/{id}', 'AboutController@disable')->name('disable_abouts');
});
