<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id('id_animal');
            $table->string('nombre', 100);
            $table->string('tipo', 50);
            $table->integer('edad')->nullable();
            $table->enum('sexo', ['M', 'F']);
            $table->text('descripcion')->nullable();
            $table->enum('estado_adopcion', ['disponible', 'adoptado', 'en_proceso']);
            $table->string('foto', 255)->nullable();
            $table->dateTime('fecha_ingreso')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_adoptante')->nullable();
            $table->foreign('id_adoptante')->references('id_usuario')->on('usuarios');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
