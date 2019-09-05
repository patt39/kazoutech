<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-11
 * Time: 10:25
 */

Route::group(['namespace' => 'Info'], function(){

    //Terms & Documentations Routes
    Route::get(
        '/dashboard/documentations',
        'DocumentationController@index'
    )->name('documentations.index');

    Route::get(
        '/dashboard/documentations/create',
        'DocumentationController@create'
    )->name('documentations.create');

    Route::post(
        '/dashboard/documentations',
        'DocumentationController@store'
    )->name('documentations.store');

    Route::get(
        '/dashboard/documentations/{documentation}/edit',
        'DocumentationController@edit'
    )->name('documentations.edit');

    Route::put(
        '/dashboard/documentations/{documentation}',
        'DocumentationController@update'
    )->name('documentations.update');

    Route::get(
        '/dashboard/documentations/{documentation}/downloaddocumentation',
        'DocumentationController@downloadDocumentation'
    )->name('documentations.downloaddocumentation');

    Route::get(
        '/dashboard/documentations/{documentation}/file.pdf',
        'DocumentationController@getFilelink'
    )->name('documentations.getdocumentation');


    Route::delete(
        '/dashboard/documentations/{documentation}',
        'DocumentationController@destroy'
    )->name('documentations.destroy');

});
