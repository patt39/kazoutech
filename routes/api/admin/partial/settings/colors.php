<?php

Route::get('colors', 'ColorController@api');

Route::get(
    'colors/auditing/{color}',
    'ColorController@apiauditing'
)->name('colors.auditing');
