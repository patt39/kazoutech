<?php
//Route Annonces
Route::get('annonces_dashboard', 'AnnonceController@api')->name('annonces_dashboard.api');
Route::get('annonces_assigned_dashboard', 'AnnonceController@apiannonceassigned')->name('annonces_assigned_dashboard.api');
Route::get('annonces_dashboard/{occupation}', 'AnnonceController@apioccupation')->name('annonces_dashboard.occupation.api');
