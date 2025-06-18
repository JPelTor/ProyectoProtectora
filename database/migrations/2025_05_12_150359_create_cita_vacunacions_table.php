<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaVacunacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_vacunacions', function (Blueprint $table) {
            $table->id('id_cita');
            $table->unsignedBigInteger('id_animal');
            $table->dateTime('fecha_cita');
            $table->string('tipo_vacuna', 100);
            $table->text('observaciones')->nullable();
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
        Schema::dropIfExists('cita_vacunacions');
    }
}
