<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:28
 */

Route::group(['namespace' => 'Partial'], function(){

    Route::get('diplomas', 'DiplomaController@api');
});