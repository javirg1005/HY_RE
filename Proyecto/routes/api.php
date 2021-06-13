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
Route::get("/users", "App\Http\Controllers\UserController@index");
Route::get("/users/{id}", "App\Http\Controllers\UserController@show");
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
Route::get("/empleos-filtro/{salario}", "App\Http\Controllers\EmpleoController@filtrojob");
Route::get("/scraper_trabajos", "App\Http\Controllers\EmpleoController@scraperTrabajos");

/* Ruta para operaciones de Inmuebles */
Route::get("/inmuebles", "App\Http\Controllers\InmuebleController@index");
Route::get("/inmuebles/{id}", "App\Http\Controllers\InmuebleController@getInmueble");
Route::get("/inmuebles-max-precio", "App\Http\Controllers\InmuebleController@max_precio");
Route::get("/inmuebles-max-habitaciones", "App\Http\Controllers\InmuebleController@max_hab");
Route::get("/inmuebles-max-metros", "App\Http\Controllers\InmuebleController@max_metros");
Route::get("/inmuebles-filtro-main/{prov}/{habs}/{precio}", "App\Http\Controllers\InmuebleController@filtroMain");
Route::get("/filtro-oferta/{metros}/{habs}/{precio}", "App\Http\Controllers\InmuebleController@filtroOferta");
Route::get("/scraper_inmuebles", "App\Http\Controllers\EmpleoController@scraperInmuebles");

/* Ruta para operaciones de Actividades */
Route::get("/actividades", "App\Http\Controllers\ActividadController@index");
Route::get("/actividades/{id}", "App\Http\Controllers\ActividadController@getActividad");

/* Ruta para operaciones de Noticia */
Route::get("/noticias", "App\Http\Controllers\NoticiaController@index");
Route::get("/noticias/{id}", "App\Http\Controllers\NoticiaController@getNoticia");

/* Ruta para operaciones de Inmuebles Favoritos */
Route::get("/favs", "App\Http\Controllers\FavController@index");
Route::get("/favs/{userId}", "App\Http\Controllers\FavController@getFavsByUsuId");
Route::get("/favs-isfav/{id_usu}/{id_inmueble}", "App\Http\Controllers\FavController@isFav");
Route::get("/favs-id/{id_usu}/{id_inmueble}", "App\Http\Controllers\FavController@getFavId");
Route::post("/favs-addFav","App\Http\Controllers\FavController@addFav");
Route::delete("/favs/{id}","App\Http\Controllers\FavController@delete");

/* Ruta para operaciones de Empleos Favoritos */
Route::get("/favsjob", "App\Http\Controllers\FavsjobController@index");
Route::get("/favsjob/{userId}", "App\Http\Controllers\FavsjobController@getFavsByUsuId");
Route::post("/favsjob-addFav", "App\Http\Controllers\FavsjobController@addFav");