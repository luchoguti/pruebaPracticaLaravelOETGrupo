<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehiculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id_vehiculo');
            $table->string('placa');
            $table->string('color');
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_marca')->references('id_marca')->on('marcas');
            $table->enum('tipo_vehiculo', ['particular', 'publico']);
            $table->integer('id_conductor')->unsigned();
            $table->foreign('id_conductor')->references('id_usu_acme')->on('usuarios_acme');
            $table->integer('id_propietario')->unsigned();
            $table->foreign('id_propietario')->references('id_usu_acme')->on('usuarios_acme');
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
        Schema::dropIfExists('vehiculos');
    }
}
