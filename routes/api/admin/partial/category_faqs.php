<?php

Route::group(['namespace' => 'Partial'], function(){

    Route::get('category-faqs', 'CategoryfaqController@api');
});
