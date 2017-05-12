<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
  /*
  tabla que usa el modelo
  */
  protected $table = 'comentarios';

  /*
  *Atributos que son modificable por el usuario
  */
  protected $fillable = ['descripcion', 'id_producto', 'id_autor' ];

}
