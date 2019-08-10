<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-08
 * Time: 21:35
 */

Route::group(['namespace' => 'Info'], function(){

    Route::get('policy_privacy', 'PolicyprivacyController@api');
});
