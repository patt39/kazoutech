<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-08
 * Time: 21:21
 */

Route::group(['namespace' => 'Info'], function(){

    //Terms & Conditions Routes
    Route::resource('/dashboard/conditions', 'ConditionController');
    Route::get('/dashboard/conditions/lm/{condition}', 'ConditionController@vector')->name('conditions.view');
    Route::get('/dashboard/conditions/view/{slug}', 'ConditionController@view');
    Route::get('/dashboard/unactive_condition/{id}', 'ConditionController@unactive_condition');
    Route::get('/dashboard/active_condition/{id}', 'ConditionController@active_condition');
});
