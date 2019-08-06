<?php
Route::group(['namespace' => 'Partial'], function(){

    //Admin Route colors
    Route::resource('dashboard/colors', 'ColorController');
    Route::get('/dashboard/active_color/{id}', 'ColorController@active')->name('active_color');
    Route::get('/dashboard/disable_color/{id}', 'ColorController@disable')->name('disable_color');
});
