<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  /*
  tabla que usa el modelo
  */
  protected $table = 'producto';

  /*
  *Atributos que son modificable por el usuario
  */
  protected $fillable = ['nombre', 'tiempo_uso', 'antiguedad', 'descripcion', 'id_usuario' ];
}
