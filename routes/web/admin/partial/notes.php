<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:11
 */

//Notes administrator Route
Route::resource('/dashboard/notes', 'NoteController');
Route::get('/dashboard/active_notes/{id}', 'NoteController@active')->name('active_notes');
Route::get('/dashboard/disable_notes/{id}', 'NoteController@disable')->name('disable_notes');
