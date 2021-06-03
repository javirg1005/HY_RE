<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->text('Localidad');
            $table->text('Titulo');
            $table->integer('Metros');
            $table->integer('Precio');
            $table->integer('Habitaciones');
            $table->integer('Banos');
            $table->text('Telefono');
            $table->text('Descripcion');
            $table->text('Url');
            $table->text('Url_imagen');
            $table->text('Pago');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmuebles');
    }
}
