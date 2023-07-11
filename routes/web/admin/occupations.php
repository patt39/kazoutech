<?php

//Route Occupation
Route::resource('/dashboard/occupations', 'OccupationController');
Route::get('/dashboard/occupations/v/{occupation}', 'OccupationController@occupation')->name('occupation.show_dashboard');
Route::get('/dashboard/occupations/v/{occupation}/create', 'OccupationController@occupationcreate')->name('occupations.show_dashboard_create');
Route::get('/dashboard/occupations/v/{occupation}/{id}/edit', 'OccupationController@occupationedit')->name('occupations.show_dashboard_edit');
Route::get('/dashboard/active_occupations/{id}', 'OccupationController@active')->name('actives_occupations');
Route::get('/dashboard/disable_occupations/{id}', 'OccupationController@disable')->name('disable_occupations');
