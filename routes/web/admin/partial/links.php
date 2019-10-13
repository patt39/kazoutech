<?php

//Admin Route Diplomas
Route::resource('dashboard/links', 'LinkController');

// Admin Route links
Route::get('/dashboard/api/links', 'LinkController@api');
