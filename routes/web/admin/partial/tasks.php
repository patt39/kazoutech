<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:07
 */

//Tasks administrator Route
Route::resource('/dashboard/tasks', 'TaskController');
Route::get('/api/dashboard/tasks/u/{username}', 'TaskController@usertask');
Route::put('/dashboard/update_progress_tasks/{id}', 'TaskController@updateProgress');
Route::put('/dashboard/update_description_tasks/{id}', 'TaskController@updateDescription');
Route::get('/dashboard/tasks/u/{username}', 'TaskController@view')->name('tasks.view');
