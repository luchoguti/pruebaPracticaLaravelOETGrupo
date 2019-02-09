<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuariosAcme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_acme', function (Blueprint $table) {
            $table->increments('id_usu_acme');
            $table->integer('num_cedula')->unique();
            $table->string('primer_nombre');
            $table->string('segundo_nombre');
            $table->string('apellidos');
            $table->string('direccion');
            $table->string('telefono');
            $table->integer('id_ciudad')->unsigned();
            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudades');
            $table->enum('tipo_usu_acme', ['conductor', 'propietario']);
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
        Schema::dropIfExists('usuarios_acme');
    }
}
