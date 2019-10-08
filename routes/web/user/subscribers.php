<?php

Route::get('/dashboard/subscribers', 'SubscriberController@index')->name('subscribers.index');
Route::post('subscribers', 'SubscriberController@store')->name('subscribers.store');
