<?php
//Route Faqs
Route::resource('/dashboard/blogs','BlogController');
Route::get('/dashboard/blogs/v/sites','BlogController@sites')->name('blogs.dashboard_sites');
Route::get('/dashboard/cities/change_status_blogs/{id}', 'BlogController@status')->name('status_blogs');

