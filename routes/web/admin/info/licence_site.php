<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-08
 * Time: 21:27
 */

Route::group(['namespace' => 'Info'], function(){

    //Licence Site Route
    Route::resource('/dashboard/licence_site', 'LicencesiteController');
    Route::get('/dashboard/licence_site/lm/{id}', 'LicencesiteController@vector')->name('licence_site.view');
    Route::get('/dashboard/licence_site/view/{id}', 'LicencesiteController@view');
    Route::get('/dashboard/active_licence_site/{id}', 'LicencesiteController@active');
    Route::get('/dashboard/disable_licence_site/{id}', 'LicencesiteController@disable');
});