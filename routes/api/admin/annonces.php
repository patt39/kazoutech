<?php
//Route Annonces
Route::get('annonces_dashboard', 'AnnonceController@api')->name('annonces_dashboard.api');
Route::get('annonces_dashboard/{occupation}', 'AnnonceController@apioccupation')->name('annonces_dashboard.occupation');
Route::get('annonces_dashboard/{occupation}/{city}', 'AnnonceController@apioccupationcity')->name('annonces_dashboard.city');
