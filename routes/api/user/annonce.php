<?php

Route::get('annonces','AnnonceController@apiannonces')->name('api_active.annonces');
Route::get('annonces/{occupation}',
    'AnnonceController@apiannoncesbyoccupation'
)->name('api_annonce_occupation_site.view');

Route::get(
    'annonces/{occupation}/{categoryoccupation}',
    'AnnonceController@apiannoncesbycategoryoccupation'
)->name('api_annonce_occupation_categoryoccupation_site.view');

Route::get(
    'annonces_by_occupation_categoryoccupation_count/{occupation}/{categoryoccupation}',
    'AnnonceController@apiannoncesbyoccupationcount'
)->name('apiannoncesbyoccupationcount.view');

Route::get(
    'annonces_by_occupation_categoryoccupation_count_by_city/{occupation}/{categoryoccupation}',
    'AnnonceController@apiannoncesbycategoryoccupationcountbycity'
)->name('api.apiannoncesbycategoryoccupationcountbycity');

Route::get('annonces/{occupation}/{categoryoccupation}/{city}','AnnonceController@apiannoncesbycity')->name('api_annonce_occupation_categoryoccupation_city_site.view');
Route::get('annonces/{occupation}/{categoryoccupation}/{city}/{annonce}','AnnonceController@apiannoncesoccupationshow')->name('api_annonce_site.view');

