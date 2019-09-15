<?php
//Route Faqs
Route::get('faqs', 'FaqController@api');
Route::get('faqs/c/{categoryfaq}', 'FaqController@catagoryfaqapi');
