<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="ABSA - API", version="1.0")
 * 
 * @OA\Server(url="http://127.0.0.1:8000")
 */
class ApiController extends Controller
{
    /**
     * @OA\Get (
     *      path="/api/inmuebles",
     *      summary="Todos los inmuebles",
     *      tags={"inmuebles"},
     *      @OA\Response(
     *          response=200,
     *          description="Con esta llamada se obtienen todos los inmuebles."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/inmuebles/{id}",
     *      summary="Inmueble con ese ID",
     *      tags={"inmuebles"},
     *      @OA\Parameter(
     *          description="ID del inmueble",
     *          in="path",
     *          name="id",
     *          required=true,
     *          example="1"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada te permite obtener un inmueble en concreto."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/inmuebles-max-precio",
     *      summary="Precio Máx.",
     *      tags={"inmuebles"},
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada consigue el valor de precio más alto de los inmuebles."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/inmuebles-max-habitaciones",
     *      summary="Nº Habitaciones Máx.",
     *      tags={"inmuebles"},
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada consigue el número de habitaciones más alto de los inmuebles."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/inmuebles-max-metros",
     *      summary="Metros cuadrados Máx.",
     *      tags={"inmuebles"},
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada consigue el valor de metros cuadrados más alto de los inmuebles."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/inmuebles-filtro-main/{prov}/{habs}/{precio}",
     *      summary="Filtro por provincias, nº habitaciones y precio",
     *      tags={"inmuebles"},
     *      @OA\Parameter(
     *          description="Provincia",
     *          in="path",
     *          name="prov",
     *          required=true,
     *          example="alicante"
     *      ),
     *      @OA\Parameter(
     *          description="Número de habitaciones",
     *          in="path",
     *          name="habs",
     *          required=true,
     *          example="3"
     *      ),
     *      @OA\Parameter(
     *          description="Precio",
     *          in="path",
     *          name="precio",
     *          required=true,
     *          example="1000000"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada ejecuta un filtro de inmuebles desde la ventana principal. Se introduce, la provincia, el número mínimo de habitaciones deseadas y el precio máximo a pagar."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/filtro-oferta/{metros}/{habs}/{precio}",
     *      summary="Filtro por metros cuadrados, nº habitaciones y precio",
     *      tags={"inmuebles"},
     *      @OA\Parameter(
     *          description="Metros cuadrados",
     *          in="path",
     *          name="metros",
     *          required=true,
     *          example="1000"
     *      ),
     *      @OA\Parameter(
     *          description="Número de habitaciones",
     *          in="path",
     *          name="habs",
     *          required=true,
     *          example="2"
     *      ),
     *      @OA\Parameter(
     *          description="Precio",
     *          in="path",
     *          name="precio",
     *          required=true,
     *          example="30000"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada ejecuta un filtro de inmuebles desde la ventana de ofertas. Se introduce, el número máximo de metros cuadrados, el número mínimo de habitaciones deseadas y el precio máximo que se desea pagar."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/users",
     *      summary="Todos los usuarios",
     *      tags={"usuarios"},
     *      @OA\Response(
     *          response=200,
     *          description="Con esta llamada se obtienen todos los usuarios."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/users/{id}",
     *      summary="Usuario con ese ID",
     *      tags={"usuarios"},
     *      @OA\Parameter(
     *          description="ID del usuario",
     *          in="path",
     *          name="id",
     *          required=true,
     *          example="1"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada te permite obtener un usuario en concreto."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/userId_toUsername/{username}",
     *      summary="ID de usuario desde Username",
     *      tags={"usuarios"},
     *      @OA\Parameter(
     *          description="Username del usuario",
     *          in="path",
     *          name="username",
     *          required=true,
     *          example="petersito"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada te permite obtener el ID de un usuario a partir de su nombre de usuario."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/userId_toName/{username}",
     *      summary="Nombre del usuario desde Username",
     *      tags={"usuarios"},
     *      @OA\Parameter(
     *          description="Username del usuario",
     *          in="path",
     *          name="username",
     *          required=true,
     *          example="petersito"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada te permite obtener el nombre de un usuario a partir de su nombre de usuario."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Post (
     *      path="/api/auth/login",
     *      summary="Login de usuario",
     *      description="Login mediante usuario y contraseña.",
     *      tags={"usuarios"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Introduce las credenciales de usuario",
     *          @OA\JsonContent(
     *              required={"username", "password"},
     *              @OA\Property(property="username", type="string", format="text", example="petersito"),
     *              @OA\Property(property="password", type="string", format="password", example="123456")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Token para usuario generado."
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Credenciales incorrectas",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Lo siento, usuario o contraseña incorrecta. Por favor, inténtelo de nuevo.")
     *          )
     *      )
     * ),
     * @OA\Post (
     *      path="/api/auth/register",
     *      summary="Registro de usuario",
     *      description="Registro mediante usuario, nombre del usuario, email y contraseña.",
     *      tags={"usuarios"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Introduce los datos del usuario",
     *          @OA\JsonContent(
     *              required={"username", "name", "email", "password"},
     *              @OA\Property(property="username", type="string", format="text", example="petersito"),
     *              @OA\Property(property="name", type="string", format="text", example="Pedro"),
     *              @OA\Property(property="email", type="string", format="email", example="peter@gmail.com"),
     *              @OA\Property(property="password", type="string", format="password", example="123456")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Usuario registrado correctamente.",
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/empleos",
     *      summary="Todos los empleos",
     *      tags={"empleos"},
     *      @OA\Response(
     *          response=200,
     *          description="Con esta llamada se obtienen todos los empleos."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/empleos/{id}",
     *      summary="Empleo con ese ID",
     *      tags={"empleos"},
     *      @OA\Parameter(
     *          description="ID del empleo",
     *          in="path",
     *          name="id",
     *          required=true,
     *          example="1"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada te permite obtener un empleo en concreto."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/empleos-filtro/{salario}",
     *      summary="Empleos con igual o mayor salario",
     *      tags={"empleos"},
     *      @OA\Parameter(
     *          description="Salario del empleo",
     *          in="path",
     *          name="salario",
     *          required=true,
     *          example="1000"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada te permite obtener los empleos con un salario igual o mayor a este."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/favs",
     *      summary="Todos los inmuebles favoritos",
     *      tags={"favoritos-inmuebles"},
     *      @OA\Response(
     *          response=200,
     *          description="Con esta llamada se obtienen todos los inmuebles guardados en favoritos."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/favs/{user_id}",
     *      summary="Inmueble favorito del usuario con ese ID",
     *      tags={"favoritos-inmuebles"},
     *      @OA\Parameter(
     *          description="ID del usuario",
     *          in="path",
     *          name="user_id",
     *          required=true,
     *          example="1"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada te permite obtener los inmuebles favoritos de un usuario en concreto."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/favs-isfav/{id_usu}/{id_inmueble}",
     *      summary="Comprueba si el inmueble es favorito",
     *      tags={"favoritos-inmuebles"},
     *      @OA\Parameter(
     *          description="ID del usuario",
     *          in="path",
     *          name="id_usu",
     *          required=true,
     *          example="1"
     *      ),
     *      @OA\Parameter(
     *          description="ID del inmueble",
     *          in="path",
     *          name="id_inmueble",
     *          required=true,
     *          example="1"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Devuelve un boolean diciendo true si el inmueble no se encuentra en la lista de favoritos o false si lo está."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/favs-id/{id_usu}/{id_inmueble}",
     *      summary="Devuelve el ID del inmueble favorito",
     *      tags={"favoritos-inmuebles"},
     *      @OA\Parameter(
     *          description="ID del usuario",
     *          in="path",
     *          name="id_usu",
     *          required=true,
     *          example="1"
     *      ),
     *      @OA\Parameter(
     *          description="ID del inmueble",
     *          in="path",
     *          name="id_inmueble",
     *          required=true,
     *          example="1"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Esta llamada te permite obtener un inmueble favorito en concreto."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Post (
     *      path="/api/favs-addFav",
     *      summary="Añadir un inmueble favorito",
     *      description="Inserta el inmueble favorito con el ID del usuario loggeado y el ID del inmueble que le gusta.",
     *      tags={"favoritos-inmuebles"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Introduce los IDs de usuario e inmueble",
     *          @OA\JsonContent(
     *              required={"id_usu", "id_inmueble"},
     *              @OA\Property(property="id_usu", type="string", format="text", example="1"),
     *              @OA\Property(property="id_inmueble", type="string", format="text", example="10")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Inmueble favorito registrado correctamente.",
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Delete (
     *      path="/api/favs/{id}",
     *      summary="Elimina el inmueble favorito con ese ID",
     *      security={ {"bearer": {} }},
     *      tags={"favoritos-inmuebles"},
     *      @OA\Parameter(
     *          description="ID del inmueble favorito",
     *          in="path",
     *          name="id",
     *          required=true,
     *          example="1"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Elimina de la lista de favoritos el inmueble favorito con el ID."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/scraper_inmuebles",
     *      summary="Activa scraper inmuebles",
     *      tags={"scrapers"},
     *      @OA\Response(
     *          response=200,
     *          description="Con esta llamada se obtienen todos los inmuebles de la página web fotocasa."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     * @OA\Get (
     *      path="/api/scraper_trabajos",
     *      summary="Activa scraper empleos",
     *      tags={"scrapers"},
     *      @OA\Response(
     *          response=200,
     *          description="Con esta llamada se obtienen todos los empleos de la página web infoempleo."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Ha ocurrido un error."
     *      )
     * ),
     */
    public function index() {
        return "¡Probando!";
    }
}
