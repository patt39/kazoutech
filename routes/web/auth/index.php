<?php
Route::group(['namespace' => 'Auth'], function(){

    require(__DIR__ . DIRECTORY_SEPARATOR . 'invite.php');

    require(__DIR__ . DIRECTORY_SEPARATOR . 'register.php');
});
