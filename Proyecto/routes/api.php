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

//Parche login laravel
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


// Nuestro método para la API de usuarios

/* Sacar JSON de usuarios */
Route::resource("/users", "App\Http\Controllers\UserController");

Route::post('auth/register', 'App\Http\Controllers\UserController@register');
Route::post('auth/login', 'App\Http\Controllers\UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');
});

/* Ruta para operaciones de la tabla Empleos */
Route::get("/empleos", "App\Http\Controllers\EmpleoController@index");
Route::get("/empleos/{id}", "App\Http\Controllers\EmpleoController@show");

/* Ruta para operaciones de Inmuebles */
Route::resource("/inmuebles", "App\Http\Controllers\InmuebleController");

/* Ruta para operaciones de Actividades */
Route::resource("/actividades", "App\Http\Controllers\ActividadesController");

/* Ruta para operaciones de Noticia */
Route::resource("/noticias", "App\Http\Controllers\NoticiaController");