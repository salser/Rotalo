<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Migración para la creación de la tabla de productos con un metodo que crea la tabla
* Con php artisan migrate en la cmd y otro que las elimina
* con php artisan migrste:reset
*/
class CrearTablaProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('tiempo_uso');
            $table->string('antiguedad');
            $table->string('descripcion');
            $table->string('foto');
						$table->string('foto2');
						$table->string('foto3');
						$table->string('foto4');
						$table->string('foto5');
						$table->string('foto6');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');
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
          Schema::drop('producto');
    }
}
