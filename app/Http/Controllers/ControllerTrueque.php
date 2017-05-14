<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trueque;

use Redirect;
use Input;


class ControllerTrueque extends Controller
{

    /**
     * Show the form for creating a new trueque.
     *
     * @return Redirect to a existing view
     */
    public function crearTrueque($idP1, $idU1, $idU2)
    {
      if (Input::has('group1')) {
        $t = new Trueque;
        $t->estado = 3;
        $t->id_usuario1 = $idU1;
        $t->id_producto1 = $idP1;
        $t->id_usuario2 = $idU2;
        $t->id_producto2 = Input::get('group1');
        $t->save();
        return Redirect::to('productoEspecifico/'.$idP1)->with('trueque', 'El producto ha sido añadido al historial de trueques como trueque en espera');
      }
      return Redirect::to('productoEspecifico/'.$idP1)->with('nTrueque', 'El productono pude ser añadido, seleccione un producto para intercambiar');
    }

}
