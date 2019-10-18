<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:45
 */

Route::group(['namespace' => 'Page'], function(){

    //Testimonials Route
    Route::resource('/dashboard/testimonials', 'TestimonialController');
    Route::get('/dashboard/testimonials/tm/{testimonial}', 'TestimonialController@vector')->name('testimonials.vector');
    Route::get('/dashboard/testimonials/view/{slug}', 'TestimonialController@view');
    Route::get('/dashboard/change_status_testimonials/{id}', 'TestimonialController@status');
});
