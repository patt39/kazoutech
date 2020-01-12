<?php

// Admin Invitation
Route::get('devenir_charbonneur', 'RegisterController@devenir_charbonneur')->name('register.devenir_charbonneur');
Route::post('devenir_charbonneur', 'RegisterController@devenir_charbonneur_store_register')->name('devenir_charbonneur.store');
