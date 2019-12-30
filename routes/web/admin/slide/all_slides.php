<?php

Route::group(['namespace' => 'Slide'], function(){

    /** C'est route du slide home */
    Route::resource('/dashboard/slidehomes', 'SlidehomeController');
    Route::get('/dashboard/change_status_slidehomes/{slidehome}', 'SlidehomeController@status')->name('status_slidehomes');


});
