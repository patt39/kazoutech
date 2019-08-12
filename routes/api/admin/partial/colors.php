<?php
Route::group(['namespace' => 'Partial'], function(){

    Route::get('colors', 'ColorController@api');
});
