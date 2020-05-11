<?php
//Route Faqs
Route::resource('/dashboard/faqs_occupation','FaqOccupationController');
Route::get('/dashboard/faqs_occupation/c/{occupation}', 'FaqOccupationController@occupationfaq')->name('faqs_occupation.occupationfaq');
Route::get('/dashboard/faqs_occupation_active/{id}/status','FaqOccupationController@status')->name('faqs_occupation_status.occupationfaq');







