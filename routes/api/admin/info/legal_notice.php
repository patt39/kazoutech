<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-08
 * Time: 21:22
 */

Route::group(['namespace' => 'Info'], function(){

    Route::get('legal_notice', 'LegalnoticeController@api');
});