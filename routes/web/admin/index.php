<?php

Route::group(['namespace' => 'Admin','middleware' => 'auth:web'], function(){

    Route::get(
        '/dashboard',
        'AdminController@index'
    )->name('dashboard.index');

    /* Admin */
    require(__DIR__ . DIRECTORY_SEPARATOR . 'account.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'faqs.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'occupations.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'permissions.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'roles.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'laravel-auditing.php');

    /** C'est route son dans la cartella partial */
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'tags.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'cities.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'colors.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'category_faqs.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'tasks.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'notes.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'diplomas.php');


    /** C'est route son dans la cartella page */
    require(__DIR__ . DIRECTORY_SEPARATOR . 'page'. DIRECTORY_SEPARATOR . 'abouts.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'page'. DIRECTORY_SEPARATOR . 'testimonials.php');

    /** C'est route son dans la cartella info */
    require(__DIR__ . DIRECTORY_SEPARATOR . 'info'. DIRECTORY_SEPARATOR . 'legal_notice.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'info'. DIRECTORY_SEPARATOR . 'conditions.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'info'. DIRECTORY_SEPARATOR . 'documentation.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'info'. DIRECTORY_SEPARATOR . 'licence_site.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'info'. DIRECTORY_SEPARATOR . 'policy_privacy.php');





});
