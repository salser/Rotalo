<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function(Blueprint $table){
          $table->increments('id');
          $table->string('descripcion');
          $table->integer('id_autor')->unsigned();
          $table->foreign('id_autor')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');
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
        Schema::drop('comentarios');
    }
}
