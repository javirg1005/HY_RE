<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavsjobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favsjobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Id_usu');
            $table->unsignedBigInteger('Id_job');
            $table->timestamps();
            $table->foreign('Id_usu')->references('id')->on('users');
            $table->foreign('Id_job')->references('id')->on('empleos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favsjobs');
    }
}
