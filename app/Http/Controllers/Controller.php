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
}
