<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id('id_comentario');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_animal')->nullable();
            $table->unsignedBigInteger('id_evento')->nullable();
            $table->unsignedBigInteger('id_noticia')->nullable();
            $table->text('texto');
            $table->dateTime('fecha_comentario')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_animal')->references('id_animal')->on('animals');
            $table->foreign('id_evento')->references('id_evento')->on('eventos');
            $table->foreign('id_noticia')->references('id_noticia')->on('noticias');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
