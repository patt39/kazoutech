<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:28
 */


Route::get('diplomas', 'DiplomaController@api');
Route::get('diplomas_by_status', 'DiplomaController@apibystatus');
