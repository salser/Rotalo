<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Input;
use Redirect;
use Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/*
* Controlador que maneja todos los post y gets en cuanto
* al inicio y cierre de sesión concierne
*/
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
		public function muestraLogin()
    {
        // Si el usuario ya esta logeado redirige al inicio con mensaje de error
        if (Auth::check())
        {
            return Redirect::to('/')
												->with('mensaje_error', 'Usted ya ha iniciado sesión con Rótalo')
												->withInput();
        }
        // se muestra la vista de inicio de sesion
        return View::make('inicio');
    }

		/**
		* Valida Datos de Usuario
		*/
		public function postLogin()
		{
			/*Se guardan los datos del usuario dentro de un
			arreglo desde el fromulario*/
			$contra = Input::get('contrasena');
			$usu = Input::get('usuario');
			$datosUsuario = array(
				'username' => $usu,
				'password' => $contra
			);
			/**
			*Se valida los datos de usuario y ademas enviamos como segundo
			*parametro la opcion de recordar los datos del usuario
			*/
			if(Auth::attempt($datosUsuario, Input::get('remember-me',0)))
			{
				//Si es valido lo direcciona al lugar de bienvenida
				return Redirect::to('/')
										->with('usuario', $usu);
			}
			/**
			*En caso de fallar regresa al login con msj de Error
			*/
			return Redirect::to('inicio')
									 ->with('mensaje_error', 'Tus datos son incorrectos')
									 ->withInput();
		}
		public function cerrar()
    {
        Auth::logout();
        return Redirect::to('/')
                    ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }
    public function enviarPQR(){
      /*nombre correo asunto contenido*/
      if (Input::has('nombre') && Input::has('correo') && Input::has('asunto') && Input::has('contenido')) {
        $nombre = Input::get('nombre');
        $correo = Input::get('correo');
        $asunto = Input::get('asunto');
        $contenido = Input::get('contenido');

        //Correo donde se le va a mandar el correo del usuario
	      $to = 'henry.salazar@rotalo.online';
	      //subject del correo al usuario
	      $subject = "Nueva PQR en Rótalo de ".$nombre;

	      //Este es el formato del correo electronico
	      $message =
        '<!DOCTYPE html>
        <html>

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
        		a{
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
        			<h2>Hola Administrador,</h2>
        			<p class="contenido">
                El siguiente mensaje es de un cliente y es un PQR,
                para Rótalo los clientes son muy importante responde lo antes posible este</p>
                <b>Detalles</b><br>
                <p>
                  <b>Nombre Cliente: </b> '.$nombre.'
                  <b>Correo: </b> '.$correo.'<br>
                  <b>Asunto: </b>'.$asunto.' <br>
                  <b>Contenido: </b> '.$contenido.'<br>
                </p>
                <h5><b>Atentamente: Plataforma de Rótalo</b></h5>
                <br>
        			<h6>Haz Click para iniciar sesión y administrar</h6>
        			<a href="http://rotalo.online/inicio" class="btn-mine">Iniciar sesión</a>
        			<img src="https://preview.ibb.co/cMkgVk/logo_Rotalo.png" class="responsive-img" alt="">
        		</div>
        		<div class="footerMine">
        		</div>
        	</main>
        </body>

        </html>';
	      //Este es el header del mail
	      $headers = 'From: noReply@rotalo.online' . "\r\n" .
	      'Reply-To: '. $correo . "\r\n" .
	      'MIME-Version: 1.0' . "\r\n".'Content-type:text/html;charset=ISO-8859-1'."\r\n";
	      //Manda el correo
	      mail($to, $subject, $message, $headers);
        return Redirect::to('/contactanos')->with('mensaje', 'La PQRS fue enviada con satisfacción');
      }
      return Redirect::to('/contactanos')->with('mensajeN', 'No se pudo enviar la petición verifique campos');
    }
}
