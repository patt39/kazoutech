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


/** Dashboard */
require(__DIR__ . DIRECTORY_SEPARATOR . 'api' .DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'index.php');

/** User */
require(__DIR__ . DIRECTORY_SEPARATOR . 'api' .DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'index.php');


Route::get('search', 'Admin\UserController@search');
Route::get('administrators', 'Admin\AdministratorController@api');


Route::get('countries', 'Admin\Partial\CountryController@api');

Route::get('search/tasks/{field}/{query}', 'Admin\Partial\TaskController@search');
Route::get('task_technicians', 'Admin\TasktechnicianController@api');
Route::get('roles', 'Admin\RoleController@api');
Route::get('categories', 'Admin\Partial\CityController@api');

Route::get('mails', 'User\MailController@api');
Route::get('messages', 'User\MessageController@api');


Route::post('register','Auth\AuthController@register');
Route::post('login','Auth\AuthController@login');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
