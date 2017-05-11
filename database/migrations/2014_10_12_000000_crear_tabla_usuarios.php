<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Migración para la creación de la tabla usuario con un metodo que crea la tabla
* Con php artisan migrate en la cmd y otro que las elimina
* con php artisan migrste:reset
*/
class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
						$table->string('apellido');
						$table->string('username')->unique();
            $table->string('correo')->unique();
						$table->string('telefono');
            $table->string('password');
            $table->string('foto');
						$table->unsignedInteger('calificacion');	
            $table->rememberToken();
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
        Schema::drop('usuarios');
    }
}
