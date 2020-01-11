<?php
//Route Annonces
Route::resource('/dashboard/annonces','AnnonceController');
Route::get('/dashboard/change_annonce/{id}', 'AnnonceController@status')->name('status_annonce');
