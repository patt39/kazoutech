<?php

Route::get('occupations/{occupation}','MultiplesRouteController@apioccupationbyslug')->name('occupations.view');
Route::get('occupations/{occupation}/{categoryoccupation}','MultiplesRouteController@apicategoryoccupationbyslug')->name('categoryoccupations.view');


Route::get('all_blogs','MultiplesRouteController@apiblogs')->name('api_active.blogs');
Route::get('all_last_blogs','MultiplesRouteController@apilastblogs')->name('api_active_last.blogs');
