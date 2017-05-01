<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
* Modelo que representa un Producto dentro de el sistema
**/
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

	public function categoria()
	{
		return $this->hasOne('App\Categoria');
	}
}
