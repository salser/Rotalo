<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CampoComentarioTrueque extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('trueques', function($table){
        $table->string('comentario')->default('El comentario: ');
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
          $table->dropColumn('comentario');
      });
    }
}
