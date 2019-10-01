<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-10
 * Time: 06:55
 */

Route::get('cities', 'CityController@api');
Route::get('cities/actives', 'CityController@apiactives');
Route::get('cities_by_status', 'CityController@apibystatus');
