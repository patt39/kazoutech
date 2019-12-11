<?php

//Route Occupation
Route::get('category_occupations', 'CategoryOccupationController@api')->name('api.category_occupations');
Route::get('active_category_occupations', 'CategoryOccupationController@activestatus')->name('api_active.category_occupations');
Route::get('occupations_by_status', 'CategoryOccupationController@apibystatus');
