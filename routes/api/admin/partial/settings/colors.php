<?php

Route::get('colors', 'ColorController@api')->name('api.colors');

Route::get(
    'colors/auditing/{color}',
    'ColorController@apiauditing'
)->name('colors.auditing');
