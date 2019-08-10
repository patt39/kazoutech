<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-10
 * Time: 06:55
 */

Route::group(['namespace' => 'Partial'], function(){

    Route::get('cities', 'CityController@api');
    Route::get('cities_by_status', 'CityController@apibystatus');
});