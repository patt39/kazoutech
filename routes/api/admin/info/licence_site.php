<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-08
 * Time: 21:27
 */

Route::group(['namespace' => 'Info'], function(){

    Route::get('licence_site', 'LicencesiteController@api');
});