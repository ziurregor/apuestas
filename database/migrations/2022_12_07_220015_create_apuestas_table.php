<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apuestas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_grupo')->nullable();
            $table->integer('id_partido');
            $table->integer('id_usuario')->nullable();
            $table->integer('id_equipo_local')->nullable();
            $table->integer('score_equipo_local');
            $table->integer('id_equipo_visitante')->nullable();
            $table->integer('score_equipo_visitante');
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
        Schema::dropIfExists('apuestas');
    }
}
