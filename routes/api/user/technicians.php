<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-09
 * Time: 21:31
 */


Route::get('technicians', 'TechnicianController@api');
Route::get('technicians/p/{technician}','TechnicianController@view');
Route::get('technicians/c/{city}', 'TechnicianController@viewcity');
Route::get('technicians/o/{occupation}', 'TechnicianController@viewoccupation');
Route::get('technicians/p/{occupation}/v/{city}', 'TechnicianController@viewoccupationcity');