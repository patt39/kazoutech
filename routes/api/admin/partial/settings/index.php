<?php

Route::group(['namespace' => 'Settings'], function(){

    require(__DIR__ . DIRECTORY_SEPARATOR . 'colors.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'countries.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'diplomas.php');
});
