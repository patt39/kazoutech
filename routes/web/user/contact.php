<?php
//Admin Route contacts

Route::get(
    '/dashboard/contacts',
    'ContactController@index'
)->name('contacts.index');

Route::post(
    '/dashboard/contacts',
    'ContactController@store'
)->name('contacts.store');

Route::delete(
    '/dashboard/contacts/{id}',
    'ContactController@destroy'
)->name('contacts.destroy');

Route::get(
    '/dashboard/contacts/bookmarks',
    'ContactController@bookmaksindex'
)->name('contacts.bookmarks');


Route::get(
    '/dashboard/contacts/red_confirm/{id}',
    'ContactController@active'
);

Route::get(
    '/dashboard/contacts/discard_red/{id}',
    'ContactController@disable'
);

Route::get(
    'dashboard/contacts/msg/{contact}',
    'ContactController@contact'
)->name('contacts.view');


Route::get(
    'dashboard/contacts/view/{slug}',
    'ContactController@view'
);

Route::get(
    '/dashboard/contacts/bookmark/{id}',
    'ContactController@bookmark'
);

Route::get(
    '/dashboard/contacts/unbookmark/{id}',
    'ContactController@unbookmark'
);

//User Route Contact
Route::get('/contacts', 'ContactController@contatPage')->name('contact_cm');
Route::post('contact-cm/save', 'ContactController@store');
