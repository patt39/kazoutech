<?php

Route::get('about','MultiplesRouteController@about')->name('about');
Route::get('concept','MultiplesRouteController@concept')->name('concept');
Route::get('services','MultiplesRouteController@services')->name('services');

Route::get('faqs','MultiplesRouteController@faqs')->name('faqs');
Route::get('faqs/c/{categoryfaq}', 'MultiplesRouteController@faqsbycategory')->name('faqs_by_category');
