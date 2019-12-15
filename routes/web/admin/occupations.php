<?php

//Route Occupation
Route::resource('/dashboard/occupations', 'OccupationController');
Route::get('/dashboard/occupations/v/{occupation}', 'OccupationController@occupation')->name('occupation.show_dashboard');
Route::get('/dashboard/occupations/v/{occupation}/create', 'OccupationController@occupationcreate')->name('occupations.show_dashboard_create');
Route::post('/dashboard/occupations/v/{occupation}/save', 'CategoryOccupationController@storecategoryoccupation')->name('occupations.show_dashboard_store');
Route::get('/dashboard/active_occupations/{id}', 'OccupationController@active')->name('active_occupations');
Route::get('/dashboard/disable_occupations/{id}', 'OccupationController@disable')->name('disable_occupations');
