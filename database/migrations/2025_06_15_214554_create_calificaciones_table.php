<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id('id_calificacion');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_animal')->nullable();
            $table->unsignedBigInteger('id_evento')->nullable();
            $table->integer('puntuacion');
            $table->text('comentario')->nullable();
            $table->dateTime('fecha_calificacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_animal')->references('id_animal')->on('animals');
            $table->foreign('id_evento')->references('id_evento')->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
