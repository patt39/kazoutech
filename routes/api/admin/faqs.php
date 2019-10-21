<?php
//Route Faqs
Route::get('faqs', 'FaqController@api');
Route::get('faqs/sites','FaqController@bystatussitesapi');
Route::get('faqs/c/{categoryfaq}', 'FaqController@catagoryfaqapi');
Route::get('faqs/sites/c/{categoryfaq}', 'FaqController@bystatuscatagoryfaqapi');

