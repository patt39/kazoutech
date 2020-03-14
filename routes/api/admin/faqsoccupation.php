<?php

//route OccupationFaqs
Route::get('dashboard/faqs_occupation', 'FaqOccupationController@api')->name('api.faqoccupation');
Route::get('dashboard/faqs_occupation/c/{occupation}', 'FaqOccupationController@apioccupationfaqs')->name('api.faqoccupationslug');

