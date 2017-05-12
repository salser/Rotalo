<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comentario;
use Input;
use Redirect;

class ControllerComentario extends Controller
{

    /**
     * Show the form for creating a new comentario.
     *
     * @return \Illuminate\Http\Response
     */
    public function agregarComentario($id_u, $id_p)
    {
        if(Input::has('comentario')){
          $c = new Comentario;
          $c->descripcion = Input::get('comentario');
          $c->id_autor = $id_u;
          $c->id_producto = $id_p;
          $c->save();
          return Redirect::to('productoEspecifico/'.$id_p)->with("comentario", "Se agrego el comentario nuevo");
        }
        return Redirect::to('productoEspecifico/'.$id_p)->with("nComentario", "No Se agrego el comentario nuevo");
    }
}
