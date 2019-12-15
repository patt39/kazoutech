<?php

//Route Occupation
Route::get('occupations', 'OccupationController@api')->name('api.occupations');
Route::get('active_occupations', 'OccupationController@activestatus')->name('api_active.occupations');
Route::get('occupations_by_status', 'OccupationController@apibystatus');
