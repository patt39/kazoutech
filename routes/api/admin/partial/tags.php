<?php
Route::group(['namespace' => 'Partial'], function(){

    Route::get('tags', 'TagController@api');
});
