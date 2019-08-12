<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-11
 * Time: 10:25
 */

Route::group(['namespace' => 'Info'], function(){

    //Terms & Documentations Routes
    Route::resource('/dashboard/documentations', 'DocumentationController');
});
