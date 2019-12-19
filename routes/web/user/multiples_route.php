<?php

Route::get('about','MultiplesRouteController@about')->name('about');
Route::get('toutes-les-villes','MultiplesRouteController@touteslesvilles')->name('touteslesvilles');
Route::get('concept','MultiplesRouteController@concept')->name('concept');
Route::get('occupations','MultiplesRouteController@occupations')->name('occupations.site');
Route::get('occupations/{occupation}','MultiplesRouteController@occupation')->name('occupation.show');
Route::get('occupations/{occupation}/{categoryoccupation}','MultiplesRouteController@categoryoccupation')->name('categoryoccupation.show');



Route::get('faqs','MultiplesRouteController@faqs')->name('faqs');
Route::get('faqs/c/{categoryfaq}', 'MultiplesRouteController@faqsbycategory')->name('faqs_by_category');




Route::get('blog','MultiplesRouteController@blogs')->name('blogs');
Route::get('blog/{occupation}','MultiplesRouteController@blogsoccupation')->name('blog_view');
Route::get('blog/{occupation}/{blog}','MultiplesRouteController@blogsoccupationslug')->name('blog.occupation_slug');


Route::get('annonces','MultiplesRouteController@annonces')->name('annonces');
Route::get('annonces/{occupation}','MultiplesRouteController@annoncesoccupation')->name('annonces_view');
Route::get('annonces/{occupation}/{annonce}','MultiplesRouteController@annoncesoccupationslug')->name('occupation.occupation_slug');

Route::get('annonces/{occupation}/v/{city}','MultiplesRouteController@annoncesoccupationcity')->name('occupation.occupation_city');
