<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmobiliariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmobiliaria', function (Blueprint $table) {
            $table->id();
            $table->text('Titulo');
            $table->text('Precio');
            $table->text('Metros');
            $table->text('Habitaciones');
            $table->text('Descripcion');
            $table->text('Telefono');
            $table->text('URL');
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
        Schema::dropIfExists('inmobiliaria');
    }
}
