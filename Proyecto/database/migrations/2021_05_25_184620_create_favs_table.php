<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Id_usu');
            $table->unsignedBigInteger('Id_inmueble');
            $table->timestamps();
            $table->foreign('Id_usu')->references('id')->on('users');
            $table->foreign('Id_inmueble')->references('id')->on('inmuebles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favs');
    }
}
