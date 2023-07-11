<?php

Route::get(
    '/api/deviscontacts',
    'DeviscontactsController@api'
)->name('api.deviscontacts_dashboard');

Route::get(
    '/dashboard/deviscontacts',
    'DeviscontactsController@index'
)->name('deviscontacts.index');

Route::get(
    '/dashboard/deviscontacts/{deviscontact}',
    'DeviscontactsController@view'
)->name('deviscontacts.view');

Route::get(
    'dashboard/deviscontacts/msg/{deviscontact}',
    'DeviscontactsController@contact'
)->name('deviscontacts_show');

Route::get(
    'dashboard/deviscontacts/view/{slug}',
    'DeviscontactsController@view'
)->name('deviscontacts.viewSlug');

Route::get(
    '/dashboard/deviscontacts/red_confirm/{id}',
    'DeviscontactsController@active'
)->name('deviscontacts.active');

Route::get(
    '/dashboard/deviscontacts/discard_red/{id}',
    'DeviscontactsController@disable'
)->name('deviscontacts.disable');

Route::delete(
    '/dashboard/deviscontacts/{id}',
    'DeviscontactsController@destroy'
)->name('deviscontacts.destroy');

Route::post(
    'deviscontacts/{occupation}',
    'DeviscontactsController@deviscontacts'
)->name('deviscontacts.save');
