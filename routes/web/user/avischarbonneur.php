<?php

Route::get(
    'api/avis/{user}/by_charbonneur',
    'AvischarbonneurController@apiavischarbonneurssite'
)->name('api.avischarbonneurs_site');

Route::delete(
    '/dashboard/avischarbonneurs/{id}',
    'AvischarbonneurController@destroy'
)->name('avischarbonneurs.destroy');

Route::post(
    'avischarbonneursonline/{user}',
    'AvischarbonneurController@avischarbonneursonline'
)->name('avischarbonneurs.onlinesave');

Route::post(
    'avischarbonneursoffline/{user}',
    'AvischarbonneurController@avischarbonneursoffline'
)->name('avischarbonneurs.offlinesave');
