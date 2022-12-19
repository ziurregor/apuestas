<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->partidos_id();
            $table->string('etapa_face');
            $table->integer('id_local');
            $table->integer('score_local')->nullable()->unsigned();
            $table->integer('id_visitante');
            $table->integer('score_visitante')->nullable()->unsigned();
            $table->timestamp("hora_inicio");
            $table->boolean('alargue')->nullable()->default(false);
            $table->boolean('penales')->nullable()->default(false);
            $table->integer('penales_local')->nullable()->unsigned();
            $table->integer('penales_visitante')->nullable()->unsigned();
            $table->boolean('activo')->nullable()->default(true);
            $table->timestamps();
            // $table->foreign('id_local')
            //     ->references('id')
            //     ->on('equipos')
            //     ->onDelete('cascade');
        });
        // $table->foreignId('id_local')->constrained('e');
        // $table->foreign('user_id')->references('id')->on('users');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidos');
    }
}
