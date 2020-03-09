<?php
//Route Annonces
//Route::resource('/dashboard/annonces','AnnonceController');
Route::get('/dashboard/annonces/tasks/{occupation}/{city}/{annonce}/assigned','AnnonceController@assignedtask')->name('assignedtask');
Route::post(
    '/dashboard/annonces/tasks/{occupation}/{city}/{annonce}/save',
    'AnnonceController@assignedtaskstore'
)->name('assignedtaskstore');
Route::get('/dashboard/annonces/assigned','AnnonceController@assigned')->name('annonce_assign');
Route::get('/dashboard/change_annonce/{id}', 'AnnonceController@status')->name('status_annonce');

