<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-10
 * Time: 06:55
 */

Route::group(['namespace' => 'Partial'], function(){

    //Admin Route city
    Route::resource('/dashboard/cities', 'CityController');
    Route::get('/dashboard/active_cities/{id}', 'CityController@active')->name('active_cities');
    Route::get('/dashboard/disable_cities/{id}', 'CityController@disable')->name('disable_cities');
});