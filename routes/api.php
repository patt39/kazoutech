<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('colors', 'Admin\Partial\ColorController@api');
Route::get('countries', 'Admin\Partial\CountryController@api');
Route::get('categories', 'Admin\Partial\CategoryController@api');
Route::get('contacts', 'User\ContactController@api');
Route::get('tags', 'Admin\Partial\TagController@api');



//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
