<?php

Route::group(['namespace' => 'Partial'], function(){

    /** C'est route son dans la cartella setting */
    require(__DIR__ . DIRECTORY_SEPARATOR . 'settings'. DIRECTORY_SEPARATOR . 'index.php');


    require(__DIR__ .  DIRECTORY_SEPARATOR . 'tags.php');
    require(__DIR__ .  DIRECTORY_SEPARATOR . 'cities.php');
    require(__DIR__ .  DIRECTORY_SEPARATOR . 'tasks.php');
    require(__DIR__ .  DIRECTORY_SEPARATOR . 'notes.php');
    require(__DIR__ .  DIRECTORY_SEPARATOR . 'category_faqs.php');
});
