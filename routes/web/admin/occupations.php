<?php

//Route Occupation
Route::resource('/dashboard/occupations', 'OccupationController');
Route::get('/dashboard/active_occupations/{id}', 'OccupationController@active')->name('active_occupations');
Route::get('/dashboard/disable_occupations/{id}', 'OccupationController@disable')->name('disable_occupations');
