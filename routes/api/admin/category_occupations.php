<?php

//Route Occupation
Route::get('categoryoccupations', 'CategoryOccupationController@api')->name('categoryoccupations.api');
Route::get('occupations/v/{occupation}/{id}','CategoryOccupationController@apioccupationbyslugedit')->name('occupations.apioccupationbyslugedit');
