<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
* Modelo que representa una categoria de un producto dentro de el sistema
**/
class Categoria extends Model
{
		/*
	  tabla que usa el modelo
	  */
    protected $table = 'categorias';

		/*
	  *Atributos que son modificable por el usuario
	  */
		protected $fillable = [
													  'id',
		 											  'placa',
													  'modelo',
													  'km',
														'color',
														'combusible',
														'edicion',
														'autor',
														'album',
														'genero',
														'año',
														'tipo',
														'direccion',
														'bano',
														'alcobas',
														'referencia',
														'os',
														'almacenamiento',
														'nombre_cat',
														'id_producto'
													];
}
