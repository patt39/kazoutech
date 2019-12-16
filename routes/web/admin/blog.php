<?php
//Route Faqs
Route::resource('/dashboard/blogs','BlogController');
Route::get('/dashboard/blogs/v/sites','BlogController@sites')->name('blogs.dashboard_sites');
Route::get('/dashboard/active_blogs/{id}', 'BlogController@active')->name('active_blogs');
Route::get('/dashboard/disable_blogs/{id}', 'BlogController@disable')->name('disable_blogs');

