<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesAdopcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_adopcion', function (Blueprint $table) {
            $table->id('id_solicitud');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_animal');
            $table->dateTime('fecha_solicitud')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('estado_solicitud', ['pendiente', 'aprobada', 'rechazada']);
            $table->text('comentarios')->nullable();
            $table->dateTime('fecha_aprobacion')->nullable();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_animal')->references('id_animal')->on('animals');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes_adopcion');
    }
}
