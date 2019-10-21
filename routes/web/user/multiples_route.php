<?php

Route::get('faqs','MultiplesRouteController@faqs')->name('faqs');
Route::get('faqs/c/{categoryfaq}', 'MultiplesRouteController@faqsbycategory')->name('faqs_by_category');
