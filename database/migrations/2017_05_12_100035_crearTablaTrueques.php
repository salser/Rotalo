<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTrueques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      	Schema::create('trueques', function(Blueprint $table){
          $table->increments('id');
					$table->integer('estado')->unsigned();
          $table->integer('id_usuario2')->unsigned();
          $table->foreign('id_usuario2')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');
					$table->integer('id_usuario1')->unsigned();
          $table->foreign('id_usuario1')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');
          $table->integer('id_producto2')->unsigned();
          $table->foreign('id_producto2')
                ->references('id')
                ->on('producto')
                ->onDelete('cascade');
          $table->integer('id_producto1')->unsigned();
          $table->foreign('id_producto1')
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
			Schema::drop('trueques');
    }
}
