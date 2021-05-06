<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleosTable extends Migration
{
    public function up()
    {
        Schema::create('empleos', function (Blueprint $table) {

        $table->id();
        $table->text('Titulo');
        $table->text('Provincia');
        $table->text('Ciudad');
        $table->text('TipoContrato');
        $table->string('Salario',25);
        $table->text('Descripcion');
        $table->text('URL');
        $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('empleos');
    }
}