<?php

Route::group(['namespace' => 'Slide'], function(){

    /** C'est route du slide home */
    Route::get('slidehomes', 'SlidehomeController@api');
    Route::get('slide_homes', 'SlidehomeController@bystatussitesapi')->name('api_active_slidehomes');


});
