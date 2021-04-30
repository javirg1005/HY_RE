<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/users', 'UserController@index');
Route::get('/users/{id}', 'UserController@show');
Route::post('/users', 'UserController@store');
Route::post('/users/{id}/answers', 'UserController@answer');
Route::delete('/users/{id}', 'UserController@delete');
Route::delete('/users/{id}/answers', 'UserController@resetAnswers');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
