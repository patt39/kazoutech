<?php
//Route Faqs
Route::resource('/dashboard/faqs','FaqController');
Route::get('/dashboard/active_faqs/{id}', 'FaqController@active')->name('active_faqs');
Route::get('/dashboard/disable_faqs/{id}', 'FaqController@disable')->name('disable_faqs');
Route::get('/dashboard/faqs/c/{categoryfaq}', 'FaqController@catagoryfaq')->name('faqs.catagoryfaq');
