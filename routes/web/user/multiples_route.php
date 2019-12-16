<?php

Route::get('about','MultiplesRouteController@about')->name('about');
Route::get('toutes-les-villes','MultiplesRouteController@touteslesvilles')->name('touteslesvilles');
Route::get('concept','MultiplesRouteController@concept')->name('concept');
Route::get('occupations','MultiplesRouteController@occupations')->name('occupations.site');
Route::get('occupations/{occupation}','MultiplesRouteController@occupation')->name('occupation.show');
Route::get('occupations/{occupation}/{categoryoccupation}','MultiplesRouteController@categoryoccupation')->name('categoryoccupation.show');

Route::get('faqs','MultiplesRouteController@faqs')->name('faqs');
Route::get('faqs/c/{categoryfaq}', 'MultiplesRouteController@faqsbycategory')->name('faqs_by_category');


Route::get('blog','MultiplesRouteController@blog')->name('blog');
Route::get('blog/{occupation}','MultiplesRouteController@blogOccupation')->name('blog.occupation');
Route::get('blog/{occupation}/{slug}','MultiplesRouteController@blogOccupationSlug')->name('blog.occupation_slug');
