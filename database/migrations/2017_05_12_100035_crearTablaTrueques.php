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
					$table->integer('estado')->unsigned();
					$table->integer('id_usuario')->unsigned();
          $table->foreign('id_usuario')
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
			Schema::drop('trueques');
    }
}
