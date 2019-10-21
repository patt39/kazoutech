<?php
//Route Faqs
Route::resource('/dashboard/faqs','FaqController');
Route::get('/dashboard/faqs/v/sites','FaqController@sites')->name('faqs.dashboard_sites');
Route::get('/dashboard/active_faqs/{id}', 'FaqController@active')->name('active_faqs');
Route::get('/dashboard/disable_faqs/{id}', 'FaqController@disable')->name('disable_faqs');
Route::get('/dashboard/faqs/v/sites/c/{categoryfaq}','FaqController@catagoryfaqbystatus')->name('faqs.dashboard_sites');
Route::get('/dashboard/faqs/c/{categoryfaq}', 'FaqController@catagoryfaq')->name('faqs.catagoryfaq');

