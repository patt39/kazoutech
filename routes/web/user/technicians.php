<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-09
 * Time: 21:31
 */

//Admin Route technicians
Route::resource('dashboard/technicians','TechnicianController');
Route::get('dashboard/technicians/u/{technician}','TechnicianController@technician')->name('technicians.view');
Route::get('dashboard/technicians/c/{city}', 'TechnicianController@bycity')->name('city.technician');
Route::get('dashboard/technicians/o/{occupation}', 'TechnicianController@byoccupation')->name('occupation.technician');