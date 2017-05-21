<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CampoCalificacionTrueque extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trueques', function($table){
          $table->boolean('calificacion1')->default(0);
          $table->boolean('calificacion2')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('trueques', function($table) {
          $table->dropColumn('calificacion1');
          $table->dropColumn('calificacion2');
      });
    }
}
