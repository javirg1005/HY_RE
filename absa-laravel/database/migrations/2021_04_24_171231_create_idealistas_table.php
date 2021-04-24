<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdealistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Api_idealista', function (Blueprint $table) {
            $table->id();
            $table->titulo();
            $table->habitaciones();
            $table->AoC();
            $table->precio();
            $table->m2();
            $table->descripcion();
            $table->localizacion();
            $table->caracteristicas();
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
        Schema::dropIfExists('Api_idealista');
    }
}
