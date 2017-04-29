<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use Input;
use Redirect;
use Auth;
use File;

/*
* Controlador que maneja todos los post y gets en cuanto
* a el BREAD de productos concierne
*/
class ControllerProducto extends Controller
{
    /**
     * Actualiza la tupla en la base de datos de un producto.
     *
     */
    public function editar(Request $request)
    {
      $pdid = Input::get('id');
      $user = Auth::user();
      $producto = Producto::find($pdid);
      $cambio = '';
      if(Input::has('nombreP') && Input::has('tiempo_uso_a') && Input::has('antiguedad_a'))
      {
				if(Input::hasFile('cFotoP'))
				{
					File::delete($producto->foto);
					$foto = Input::file('cFotoP');
					$foto->move('productos', 'PD_'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
					$producto->foto= 'productos/PD_'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP2'))
				{
					File::delete($producto->foto2);
					$foto = Input::file('cFotoP2');
					$foto->move('productos', 'PD_2'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
					$producto->foto2= 'productos/PD_2'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP3'))
				{
					File::delete($producto->foto3);
					$foto = Input::file('cFotoP3');
					$foto->move('productos', 'PD_3'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
					$producto->foto3= 'productos/PD_3'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP4'))
				{
					File::delete($producto->foto4);
					$foto = Input::file('cFotoP4');
					$foto->move('productos', 'PD_4'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
					$producto->foto4= 'productos/PD_4'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP5'))
				{
					File::delete($producto->foto5);
					$foto = Input::file('cFotoP5');
					$foto->move('productos', 'PD_5'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
					$producto->foto5= 'productos/PD_5'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP6'))
				{
					File::delete($producto->foto6);
					$foto = Input::file('cFotoP6');
					$foto->move('productos', 'PD_6'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
					$producto->foto6= 'productos/PD_6'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
				}
        $producto->nombre = Input::get('nombreP');
        $producto->tiempo_uso= Input::get('tiempo_uso_a');
        $producto->antiguedad = Input::get('antiguedad_a');
        if(Input::has('descripcion_a'))
        {
          $producto->descripcion = Input::get('descripcion_a');
        }
        $producto->save();
        $cambio = 'Cambio Realizado';
        return Redirect::to('misProductos')
                ->with('cambio', $cambio)
                ->withInput();
      }
      $cambio = 'Cambio no realizado verifique campos';
      return Redirect::to('misProductos')
              ->with('noCambio', $cambio)
              ->withInput();
      }

      /*
      * Agrega una nueva tupla a la tabla productos, y
      * se asocia con el id del usuario
      */
      public function agregar(){
        $agrega = '';
        if(Input::has('nombre') && Input::has('tiempo_uso') && Input::has('antiguedad') && Input::has('descripcion'))
        {
          $producto = new Producto;
          $user = Auth::user();
          $userid = $user->id;
					if(Input::hasFile('fotoP'))
					{
						$foto = Input::file('fotoP');
						$foto->move('productos', 'PD_'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
						$producto->foto= 'productos/PD_'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP2'))
					{
						$foto = Input::file('fotoP2');
						$foto->move('productos', 'PD_2'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
						$producto->foto2= 'productos/PD_2'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP3'))
					{
						$foto = Input::file('fotoP3');
						$foto->move('productos', 'PD_3'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
						$producto->foto3= 'productos/PD_3'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP4'))
					{
						$foto = Input::file('fotoP4');
						$foto->move('productos', 'PD_4'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
						$producto->foto4= 'productos/PD_4'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP5'))
					{
						$foto = Input::file('fotoP5');
						$foto->move('productos', 'PD_5'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
						$producto->foto5= 'productos/PD_5'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP6'))
					{
						$foto = Input::file('fotoP6');
						$foto->move('productos', 'PD_6'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension());
						$producto->foto6= 'productos/PD_6'.$user->nombre.$producto->usuario.".".$foto->getClientOriginalExtension();
					}
          $producto->nombre = Input::get('nombre');
          $producto->id_usuario = $userid;
          $producto->tiempo_uso= Input::get('tiempo_uso');
          $producto->antiguedad = Input::get('antiguedad');
          $producto->descripcion = Input::get('descripcion');
          $producto->save();
          $cambio = 'Producto agregado satisfactoriamente';
          return Redirect::to('misProductos')
                  ->with('agregarProductos', $cambio)
                  ->withInput();
        }
        $cambio = 'Cambio no realizado verifique campos';
        return Redirect::to('misProductos')
                ->with('nAgregarProductos', $cambio)
                ->withInput();
      }
			public function eliminar(){
				$id = Input::get('idp');
				$producto = Producto::find($id);
				File::delete($producto->foto);
				Producto::where('id', $id)->delete();
				return Redirect::to('misProductos')
								->with('eliminado', 'Producto se eliminó satisfactoriamente')
								->withInput();
			}
    }
