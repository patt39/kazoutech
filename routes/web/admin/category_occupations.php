<?php
//Route Occupation
Route::resource('/dashboard/categoryoccupations', 'CategoryOccupationController');
Route::get('/dashboard/change_categoryoccupations/{id}', 'CategoryOccupationController@status')->name('status_categoryoccupations');
Route::put('/dashboard/occupations/v/{occupation}/{id}/', 'CategoryOccupationController@updatecategoryoccupation')->name('occupations.show_dashboard_update');
Route::post('/dashboard/occupations/v/{occupation}/save', 'CategoryOccupationController@storecategoryoccupation')->name('occupations.show_dashboard_store');
