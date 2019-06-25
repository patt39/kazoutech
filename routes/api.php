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

Route::get('users', 'Admin\UserController@api');
Route::get('search', 'Admin\UserController@search');
Route::get('administrators', 'Admin\AdministratorController@api');
Route::get('occupations', 'Admin\OccupationController@api');
Route::get('colors', 'Admin\Partial\ColorController@api');
Route::get('category-faqs', 'Admin\Partial\CategoryfaqController@api');
Route::get('faqs', 'Admin\FaqController@api');
Route::get('countries', 'Admin\Partial\CountryController@api');
Route::get('cities', 'Admin\Partial\CityController@api');
Route::get('notes', 'Admin\Partial\NoteController@api');
Route::get('tasks', 'Admin\Partial\TaskController@api');
Route::get('search/tasks/{field}/{query}', 'Admin\Partial\TaskController@search');
Route::get('tasks/u/{username}', 'Admin\Partial\TaskController@usertask');
Route::get('permissions', 'Admin\PermissionController@api');
Route::get('roles', 'Admin\RolesController@api');
Route::get('roles', 'Admin\RoleController@api');
Route::get('categories', 'Admin\Partial\CityController@api');
Route::get('contacts', 'User\ContactController@api');
Route::get('mails', 'User\MailController@api');
Route::get('messages', 'User\MessageController@api');
Route::get('tags', 'Admin\Partial\TagController@api');



Route::post('register','Auth\AuthController@register');
Route::post('login','Auth\AuthController@login');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
