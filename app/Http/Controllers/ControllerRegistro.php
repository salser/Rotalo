<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Redirect;

class ControllerRegistro extends Controller
{

		/*
    ** Retorna la vista de registro para el usuario
    ** @return \Illuminate\Http\Response
    */
    public function mostrarRegistro()
    {
      return view('registro');
    }

    /*
    ** Crea el usuario y hace la insersión a la base de datos
    ** @return \Illuminate\Http\Response
    */
    public function crearUsuario(Request $request)
    {
      $error = '';
      $usuario = new User;
      $usuario->nombre = Input::get('nombre');
      $usuario->username = Input::get('usuario');

      if(Input::hasFile('foto'))
      {
        $usuario->correo = Input::get('correo');
        $foto = Input::file('foto');
        $foto->move('/fotos', $foto->getClientOriginalName());
        $usuario->foto = $foto;
      }else{
        $error = $error.'No hay foto elegida'.'<br>';
      }
      $usuario->password = Hash::make(Input::get('contrasena'));
      //Input::get('repetirContra') == Input::get('contrasena') && Input::hasFile('foto')
       if (true)
      {
        $usuario->save();
        return Redirect::to('inicio')
                  ->with('registrado', 'Usuario Registrado satisfatoriamente')
                  ->withInput();
      }else if(Input::get('repetirContra') != Input::get('contrasena'))
      {
        $error = $error.'Contraseñas no coinciden'.'<br>';
      }

      return Redirect::to('registro')
                ->with('mensaje_error', $error)
                ->withInput();
    }
}
