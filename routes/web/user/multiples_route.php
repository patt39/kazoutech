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
Route::get('annonces/{occupation}','MultiplesRouteController@annoncesbyoccupation')->name('annonces_view');
Route::get('annonces/c/{city}','MultiplesRouteController@annoncesbycityslug')->name('annonces_view_city');
Route::get('annonces/v/{city}','MultiplesRouteController@annoncesbycity')->name('annonces_view_city');
Route::get('annonces/{occupation}/{categoryoccupation}','MultiplesRouteController@annoncesbycategoryoccupation')->name('annonces_view_categoryoccupation');
Route::get('annonces/{occupation}/{categoryoccupation}/{city}','MultiplesRouteController@annoncesbycity')->name('annonces_view_city');
Route::get('annonces/{occupation}/{categoryoccupation}/{city}/{annonce}','MultiplesRouteController@annoncesoccupationshow')->name('annonce.occupation_slug');
Route::get('annonces/{occupation}/v/{city}','MultiplesRouteController@annoncesbyoccupationbycity')->name('occupation.occupation_city');

Route::get('charbonneurs','MultiplesRouteController@charbonneurs')->name('charbonneurs');
Route::get('charbonneurs/{city}','MultiplesRouteController@charbonneursbycity')->name('charbonneurs_by_city');
Route::get('charbonneurs/{city}/{occupation}','MultiplesRouteController@charbonneursbyoccupation')->name('charbonneurs_by_occupation');

Route::get('temoignages','MultiplesRouteController@temoignages')->name('temoignages');

//Route infos
Route::get('politique_confidentialité','MultiplesRouteController@politiques')->name('politique_confidentialité');
Route::get('condition_utilisation','MultiplesRouteController@conditions')->name('condition_utilisation');
Route::get('licence_site','MultiplesRouteController@licence')->name('licence_site');


