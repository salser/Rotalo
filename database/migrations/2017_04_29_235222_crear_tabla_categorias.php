<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function(Blueprint	$table){
						$table->increments('id');
						$table->string('placa');
						$table->string('marca');
            $table->string('modelo');
            $table->string('km');
            $table->string('color');
            $table->string('combustible');
            $table->string('edicion');
            $table->string('editorial');
						$table->string('autor');
						$table->string('album');
						$table->string('genero');
						$table->string('año');
						$table->string('tipo');
						$table->string('direccion');
						$table->string('bano');
						$table->string('alcobas');
						$table->string('referencia');
						$table->string('os');
						$table->string('almacenamiento');
						$table->string('nombre_cat');
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')
                  ->references('id')
                  ->on('producto')
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
        Schema::drop('categorias');
    }
}
