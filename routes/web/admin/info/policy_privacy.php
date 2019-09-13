<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-08
 * Time: 21:35
 */

Route::group(['namespace' => 'Info'], function(){

    //Policy & Privacy Route
    Route::resource('/dashboard/policy_privacy', 'PolicyprivacyController');
    Route::get('/dashboard/policy_privacy/lm/{policyprivacy}', 'PolicyprivacyController@vector')->name('policy_privacy.view');
    Route::get('/dashboard/policy_privacy/view/{policyprivacy}', 'PolicyprivacyController@view');
    Route::get('/dashboard/active_policy_privacy/{id}', 'PolicyprivacyController@active');
    Route::get('/dashboard/disable_policy_privacy/{id}', 'PolicyprivacyController@disable');
});
