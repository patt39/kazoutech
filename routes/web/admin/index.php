<?php

Route::group(['namespace' => 'Admin','middleware' => 'auth:web'], function(){

    Route::get(
        '/dashboard',
        'AdminController@index'
    )->name('dashboard.index');

    /* Admin */
    require(__DIR__ . DIRECTORY_SEPARATOR . 'account.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'colors.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'tags.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'faqs.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'category_faqs.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'occupations.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'permissions.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'roles.php');

});
