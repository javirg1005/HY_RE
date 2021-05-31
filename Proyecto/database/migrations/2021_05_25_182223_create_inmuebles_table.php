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
            $table->text('Metros');
            $table->text('Precio');
            $table->text('Habitaciones');
            $table->text('Baños');
            $table->text('Telefono');
            $table->text('Descripcion');
            $table->text('Url');
            $table->text('Url_imagen');
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
