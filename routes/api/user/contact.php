<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-24
 * Time: 22:15
 */

Route::get('contacts', 'ContactController@api');
Route::get('contacts/bookmarks', 'ContactController@apibookmark');