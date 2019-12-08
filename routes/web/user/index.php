<?php

Route::group(['namespace' => 'User'], function(){


    require(__DIR__ . DIRECTORY_SEPARATOR . 'contact.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'profiles.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'multiples_route.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'technicians.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'subscribers.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'about.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'concept.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'faq.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'service.php');

});
