<?php

// Admin Route activities
Route::get('/dashboard/activities', 'ActivitylogController@index')->name('activities.index');
Route::get('/dashboard/api/activities', 'ActivitylogController@api');
