<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-11
 * Time: 10:23
 */

Route::group(['namespace' => 'Info'], function(){

    Route::get('documentations', 'DocumentationController@api');
});
