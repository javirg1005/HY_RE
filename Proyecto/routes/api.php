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
Route::get("/userId_toUsername/{username}", "App\Http\Controllers\UserController@getUserIdFromUsername");
Route::get("/userId_toName/{username}", "App\Http\Controllers\UserController@getNameFromUsername");

Route::post('auth/register', 'App\Http\Controllers\UserController@register');
Route::post('auth/login', 'App\Http\Controllers\UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');
});

/* Ruta para operaciones de la tabla Empleos */
Route::get("/empleos", "App\Http\Controllers\EmpleoController@index");
Route::get("/empleos/{id}", "App\Http\Controllers\EmpleoController@show");

/* Ruta para operaciones de Inmuebles */
Route::get("/inmuebles", "App\Http\Controllers\InmuebleController@index");

Route::get("/inmuebles/{id}", "App\Http\Controllers\InmuebleController@getInmueble");
Route::get("/inmuebles/hab/{habitaciones}", "App\Http\Controllers\InmuebleController@getInmuebleProvincia");
Route::get("/inmuebles/filtro-main", "App\Http\Controllers\InmuebleController@filtroMain");

/* Ruta para operaciones de Actividades */
Route::get("/actividades", "App\Http\Controllers\ActividadController@index");
Route::get("/actividades/{id}", "App\Http\Controllers\ActividadController@getActividad");

/* Ruta para operaciones de Noticia */
Route::get("/noticias", "App\Http\Controllers\NoticiaController@index");
Route::get("/noticias/{id}", "App\Http\Controllers\NoticiaController@getNoticia");

/* Ruta para operaciones de Inmuebles Favoritos */
Route::get("/favs", "App\Http\Controllers\FavController@index");
Route::get("/favs/{userId}", "App\Http\Controllers\FavController@getFavsByUsuId");
Route::post("/favs/addFav","App\Http\Controllers\FavController@addFav");

/* Ruta para operaciones de Empleos Favoritos */
Route::get("/favsjob", "App\Http\Controllers\FavsjobController@index");
Route::get("/favsjob/{userId}", "App\Http\Controllers\FavsjobController@getFavsByUsuId");