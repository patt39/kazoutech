<?php

Route::group(['namespace' => 'Partial'], function(){

    //Admin Route Diplomas
    Route::resource('dashboard/links', 'LinkController');
});
