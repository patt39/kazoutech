<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:45
 */

Route::group(['namespace' => 'Page'], function(){

    Route::get('testimonials', 'TestimonialController@api');
});