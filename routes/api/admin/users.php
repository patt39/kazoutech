<?php

Route::get('users', 'UserController@api');
Route::get('users_datatables', 'UserController@apidatatables');
Route::get('search_user', 'UserController@apisearch');
Route::get('users/trash', 'UserController@apitrash');
