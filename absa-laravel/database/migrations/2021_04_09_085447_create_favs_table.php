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
            $table->increments('ID_FAVS');
            $table->unsignedInteger('Localizador');
            $table->unsignedInteger('ID_USER');
            $table->unsignedInteger('ID_API');
            $table->foreign('ID_USER')->references('ID_USER')->on('users');
            $table->foreign('ID_API')->references('ID_API')->on('apis');
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
        Schema::dropIfExists('favs');
    }
}
