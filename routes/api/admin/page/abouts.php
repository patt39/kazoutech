<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:46
 */


Route::group(['namespace' => 'Page'], function(){

    Route::get('abouts', 'AboutController@api');
});
