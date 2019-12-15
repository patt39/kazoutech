<?php
//Route Occupation
Route::resource('/dashboard/categoryoccupations', 'CategoryOccupationController');
Route::get('/dashboard/change_categoryoccupations/{id}', 'CategoryOccupationController@status')->name('status_categoryoccupations');
