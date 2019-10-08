<?php

Route::group(['namespace' => 'User'], function(){


    require(__DIR__ . DIRECTORY_SEPARATOR . 'contact.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'profiles.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'technicians.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'subscribers.php');

});
