<?php
//Route Annonces
Route::resource('/dashboard/annonces','AnnonceController');
Route::get('/dashboard/annonces/assigned','AnnonceController@assigned');
Route::get('/dashboard/change_annonce/{id}', 'AnnonceController@status')->name('status_annonce');
Route::get('/dashboard/assigne', 'AnnonceController@assignment')->name('annonce_assignment');

