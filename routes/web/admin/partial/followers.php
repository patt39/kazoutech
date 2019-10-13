<?php

//Route Following
Route::post('user/follow/{id}', 'FollowerController@store')->name('user.follow');
Route::get('dashboard/users/p/{username}/followers', 'FollowerController@followers')->name('follower.view');
Route::get('dashboard/users/p/{username}/followings', 'FollowerController@following')->name('following.view');
Route::get('followers/{username}', 'FollowerController@GetFollowersByUser');
Route::get('followings/{username}', 'FollowerController@GetFollowingsByUser');
