<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-10
 * Time: 06:55
 */

//Admin Route city
//Route::resource('/dashboard/cities', 'CityController');

Route::get(
    '/dashboard/cities',
    'CityController@index'
)->name('cities.index');

Route::post(
    '/dashboard/cities',
    'CityController@store'
)->name('cities.store');

Route::get(
    '/dashboard/{id}/cities',
    'CityController@edit'
)->name('cities.edit');

Route::put(
    '/dashboard/cities/{id}',
    'CityController@update'
)->name('cities.update');

Route::delete(
    '/dashboard/cities/{id}',
    'CityController@destroy'
)->name('cities.destroy');

Route::get(
    '/dashboard/cities/actives',
    'CityController@actives'
)->name('cities.actives');

Route::get(
    '/dashboard/change_status_cities/{city}',
    'CityController@status'
)->name('status_cities');
