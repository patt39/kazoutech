<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-08
 * Time: 21:22
 */

Route::group(['namespace' => 'Info'], function(){

    //Legal Notice Route
    Route::resource('/dashboard/legal_notice', 'LegalnoticeController');
    Route::get('/dashboard/legal_notice/lm/{id}', 'LegalnoticeController@vector')->name('legalnotice.view');
    Route::get('/dashboard/legal_notice/view/{id}', 'LegalnoticeController@view');
    Route::get('/dashboard/active_legal_notice/{id}', 'LegalnoticeController@active');
    Route::get('/dashboard/disable_legal_notice/{id}', 'LegalnoticeController@disable');
});