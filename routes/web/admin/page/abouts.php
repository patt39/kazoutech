<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-06
 * Time: 20:46
 */
use App\Http\Controllers\Page\AboutController;


Route::group(['namespace' => 'Page'], function(){

    //Admin Route Abouts
    Route::resource('dashboard/abouts', 'AboutController');
    //Route::get('/dashboard/change_status_abouts/{about}', [AboutController::class, 'status'])->name('status_abouts');
    Route::get('/dashboard/change_status_abouts/{about}', 'AboutController@status')->name('status_abouts');
});