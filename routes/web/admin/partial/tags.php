<?php

// Admin Route tags
Route::resource('/dashboard/tags', 'TagController');
Route::get('/dashboard/tags/show/{tag}', 'TagController@view')->name('tags.view');
Route::get('/dashboard/tags/api/{slug}', 'TagController@getview');
Route::get('/dashboard/active_tags/{id}', 'TagController@active')->name('active_tags');
Route::get('/dashboard/disable_tags/{id}', 'TagController@disable')->name('disable_tags');
