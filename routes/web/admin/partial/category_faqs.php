<?php

// Admin Route categoryfaqs
Route::resource('/dashboard/category-faqs', 'CategoryfaqController');
Route::get('/dashboard/active_category-faqs/{id}', 'CategoryfaqController@active')->name('active_category-faqs');
Route::get('/dashboard/disable_category-faqs/{id}', 'CategoryfaqController@disable')->name('disable_category-faqs');
