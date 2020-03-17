<?php
//Route Faqs
Route::get('faqs', 'FaqController@api');
Route::get('site/faqs','FaqController@bystatussitesapi')->name('api_active.faqs');
Route::get('faqs/c/{categoryfaq}', 'FaqController@catagoryfaqapi');
Route::get('faqs/sites/c/{categoryfaq}', 'FaqController@bystatuscatagoryfaqapi');
