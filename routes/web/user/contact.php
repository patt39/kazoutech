<?php
//Admin Route contacts
Route::resource('dashboard/contacts', 'ContactController');
Route::get('dashboard/contacts/msg/{contact}', 'ContactController@contact')->name('contacts.view');
Route::get('dashboard/contacts/view/{slug}', 'ContactController@view');
Route::get('/dashboard/contacts/red_confirm/{id}', 'ContactController@active');
Route::get('/dashboard/contacts/discard_red/{id}', 'ContactController@disable');

//User Route Contact
Route::get('/c/contact', 'ContactController@contatPage')->name('contact_cm');
Route::post('contact-cm/save', 'ContactController@store');
