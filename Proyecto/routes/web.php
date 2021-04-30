<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/datos', function() {
    // 1) Conexión
if ($conexión = mysqli_connect("localhost", "root", "", "recomendador")){
    echo "<h3> A continuación verá una serie de datos de prueba recogidos de la base de datos </h3><br><h4>Siguen la estructura 'ID + Título + C.Autónoma + Ciudad + Tipo de Contrato + Salario + Descripción + URL' </h4>";
    
    // 2) Preparar la orden SQL
    $consulta= "SELECT*FROM empleos";
    
    // 3) Ejecutar la orden y obtener datos
    /*mysqli_select_db($conexión, "empleos");*/
    $datos= mysqli_query ($conexión, $consulta);
    while ($fila =mysqli_fetch_array($datos)){
        echo "<p>";
        echo $fila ["ID"];
        echo "<br>"; // un separador
        echo $fila["Titulo"];
        echo "<br>"; // un separador
        echo $fila ["Provincia"];
        echo "<br>"; // un separador
        echo $fila["Ciudad"];
        echo "<br>"; // un separador
        echo $fila["TipoContrato"];
        echo "<br>"; // un separador
        echo $fila["Salario"];
        echo "<br>"; // un separador
        echo $fila["Descripcion"];
        echo "<br>"; // un separador
        echo $fila["URL"];
        echo "</p>";
   } 
}});
