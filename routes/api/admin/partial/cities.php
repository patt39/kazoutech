<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-10
 * Time: 06:55
 */

Route::get('cities', 'CityController@api')->name('api.cities');
Route::get('cities/actives', 'CityController@apiactives');
Route::get('cities_by_status', 'CityController@apibystatus')->name('api.cities_by_status');
Route::get('cities_by_vip', 'CityController@apibyvip')->name('api.cities_by_vip');
