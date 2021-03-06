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
	*estado <===> 1 => aceptado ---- 2 => rechazado ---- 3 = espera ----- 4 => cancelado(nulo)
	* calificacion <===> Por calificar --> 6 --------- calificado 1 2 3 4 5 0
	*/
	protected $fillable = ['estado', 'id_producto1', 'id_usuario1', 'id_producto2', 'id_usuario2', 'calificacion1', 'calificacion2' ];

}
