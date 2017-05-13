<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trueque;

use Redirect;


class ControllerTrueque extends Controller
{

    /**
     * Show the form for creating a new trueque.
     *
     * @return Redirect to a existing view
     */
    public function crearTrueque($idP, $idU1, $idU2)
    {
      $t = new Trueque;
      $t->estado = 3;
      $t->id_usuario1 = $idU1;
      $t->id_producto1 = $idP;
      $t->id_usuario2 = $idU2;
      $t->id_producto2 = $idP;
      $t->save();
      return Redirect::to('productoEspecifico/'.$idP);
    }

}
