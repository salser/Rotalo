<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trueque extends Model
{
	/*
	tabla que usa el modelo
	*/
	protected $table = 'trueques';

	/*
	*Atributos que son modificable por el usuario
	*/
	protected $fillable = ['descripcion', 'id_producto', 'id_autor' ];

}
