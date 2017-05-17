<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trueque;
use App\User;
use App\Producto;

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
        $u1 = User::find($idU1);
        $pd1 = Producto::find($idP1);
        $u2 = User::find($idU2);
        $pd2 = Producto::find($t->id_producto2);

        //Correo donde se le va a mandar el correo del usuario
	      $to = $u1->correo;
	      //subject del correo al usuario
	      $subject = "Notificación Nuevo Trueque Rótalo";

	      //Este es el formato del correo electronico
	      $message =
        '<html>

        <head>
        	<meta charset="utf-8">
        	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />

        	<!-- Compiled and minified CSS -->
        	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

        	<style media="screen">
        		.headerMine{
        			height: 100px;
        			width: 100%;
        			background-color: #149b5a;
        		}
        		.principal{
        			margin-top: 50px;
        			margin-bottom: 50px;
        		}
        		.footerMine{
        			height: 200px;
        			width: 100%;
        			background-color: #236483;
        		}
        		.contenido{
        			font-size: 2em;
        		}
        		.btn-mine{
        			padding: 10px 10px 10px 10px;
        			border: 2px solid black;
        			background-color: rgba(72, 189, 17, 0.62);
        			border-radius: 5px 1px 1px 1px;
        			color: black;
        			text-align: center;
        			margin-top: 20px;
        			margin-bottom: 20px;
        			font-size: 1.5em;
        		}
        		.btn-mine:hover{
        			background-color: rgba(38, 129, 251, 0.6);
        		}
        		h6{
        			text-align: center;
        			font-size: 2em;
        		}
        		a.btn-mine{
        			margin-left: auto;
        			margin-right: auto;
        			display: block;
        		}
            img{
        			margin-left: auto;
        			margin-right: auto;
        			display: block;
        		}
        	</style>
        </head>

        <body>
        	<main>
        		<div class="headerMine">

        		</div>
        		<div class="container principal">
        			<h2>Hola '.$u1->username.',</h2>
        			<p class="contenido">
                El siguiente mensaje es para notificarte que uno de tus productos fue elegido para hacer un truque,
                ve a la plataforma inicia sesión y hecha un vistazo a tu historial de trueques con lo ocurrido</p>
                <b>Detalles</b><br>
                <p>
                  Producto: '.$pd1->nombre.' <br>
                  Usuario que ofrecio: '.$u2->username.' <br>
                  Producto que ofrecio: <a style="color: black" href="/productoEspecifico/'.$pd2->id.'">'.$pd2->nombre.'</a> <br>
                </p>
                <h5><b>Atentamente: Equipo de soporte de Rótalo</b></h5>
                <br>
        			<h6>Haz Click para iniciar sesión</h6>
        			<a href="http://rotalo.online/inicio" class="btn-mine">Iniciar sesión</a>
        			<img src="https://preview.ibb.co/cMkgVk/logo_Rotalo.png" class="responsive-img" alt="">
        		</div>
        		<div class="footerMine">

        		</div>
        	</main>
        </body>

        </html>';
	      //Este es el header del mail
	      $headers = 'From: nuevoTrueque@rotalo.online' . "\r\n" .
	      'Reply-To: henry.salaza@rotalo.online' . "\r\n" .
	      'MIME-Version: 1.0' . "\r\n".'Content-type:text/html;charset=ISO-8859-1'."\r\n";
	      //Manda el correo
	      mail($to, $subject, $message, $headers);
        return Redirect::to('productoEspecifico/'.$idP1)
                     ->with('trueque', 'El producto ha sido añadido al historial de trueques como trueque en espera');
      }
      return Redirect::to('productoEspecifico/'.$idP1)
                   ->with('nTrueque', 'El productono pude ser añadido, seleccione un producto para intercambiar');
    }

    /**
    * Return a view with retrospective message
    */
    public function cancelar($id, $username){
      $t = Trueque::find($id);
      $t->estado = 4;
      $t->save();
      return Redirect::to('historialTrueques/'.$username)->with('accion', 'Se ha cancelado el trueque');
    }
    /**
    * Return a view with retrospective message
    */
    public function aceptar($id, $username){
      $t = Trueque::find($id);
      $t->estado = 1;
      $p1 = Producto::find($t->id_producto1);
      $p2 = Producto::find($t->id_producto2);
      $p1->mostrado = false;
      $p2->mostrado = false;
      $p1->save();
      $p2->save();
      $t->save();
      return Redirect::to('historialTrueques/'.$username)->with('accion', 'Se ha aceptado el trueque por favor revise su correo electrónico allí encontrará los datos del otro usuario');
    }
    /**
    * Return a view with retrospective message
    */
    public function rechazar($id, $username){
      $t = Trueque::find($id);
      $t->estado = 2;
      $t->save();
      return Redirect::to('historialTrueques/'.$username)->with('accion', 'Se ha rechazado el trueque, ya mismo se le fue notificado a el otro usuario');
    }


}
