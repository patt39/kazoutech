<?php

Route::group(['middleware' => 'guest'], function(){

// Admin Invitation
    Route::get('devenir_charbonneur', 'RegisterController@devenir_charbonneur')->name('register.devenir_charbonneur');
    Route::post('devenir_charbonneur', 'RegisterController@devenir_charbonneur_store_register')->name('devenir_charbonneur.store');
    Route::put('update_charbonneur/{username}', 'RegisterController@devenir_charbonneur_update_register')->name('devenir_charbonneur.update');
});

