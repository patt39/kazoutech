<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:07
 */

Route::group(['namespace' => 'Partial'], function(){

    Route::get('tasks', 'TaskController@api');
});