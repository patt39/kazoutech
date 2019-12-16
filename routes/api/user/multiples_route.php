<?php

Route::get('occupations/{occupation}','MultiplesRouteController@apioccupationbyslug')->name('occupations.view');
Route::get('occupations/{occupation}/{categoryoccupation}','MultiplesRouteController@apicategoryoccupationbyslug')->name('categoryoccupations.view');


Route::get('all_blogs','MultiplesRouteController@apiblogs')->name('api_active.blogs');
Route::get('blog/{occupation}','MultiplesRouteController@apiblogsoccupation')->name('api_blog_occupation_site.view');
Route::get('blog/{occupation}/{blog}','MultiplesRouteController@apiblogsoccupationslug')->name('api_blog_site.view');
Route::get('all_last_blogs','MultiplesRouteController@apilastblogs')->name('api_active_last.blogs');
Route::get('all_last_blogs_interesse/{occupation}','MultiplesRouteController@apilastblogsinteresse')->name('api_active_interesse.blogs');
