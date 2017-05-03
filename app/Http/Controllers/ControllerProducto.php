<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Categoria;
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
			$catid = Input::get('catid');
			$categoria = Categoria::find($catid);
      $cambio = '';
      if(Input::has('nombreP') && Input::has('tiempo_uso_a') && Input::has('antiguedad_a'))
      {
				if(Input::hasFile('cFotoP'))
				{
					File::delete($producto->foto);
					$foto = Input::file('cFotoP');
					$foto->move('productos', 'PD_'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto= 'productos/PD_'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP2'))
				{
					File::delete($producto->foto2);
					$foto = Input::file('cFotoP2');
					$foto->move('productos', 'PD_2'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto2= 'productos/PD_2'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP3'))
				{
					File::delete($producto->foto3);
					$foto = Input::file('cFotoP3');
					$foto->move('productos', 'PD_3'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto3= 'productos/PD_3'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP4'))
				{
					File::delete($producto->foto4);
					$foto = Input::file('cFotoP4');
					$foto->move('productos', 'PD_4'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto4= 'productos/PD_4'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP5'))
				{
					File::delete($producto->foto5);
					$foto = Input::file('cFotoP5');
					$foto->move('productos', 'PD_5'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto5= 'productos/PD_5'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP6'))
				{
					File::delete($producto->foto6);
					$foto = Input::file('cFotoP6');
					$foto->move('productos', 'PD_6'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto6= 'productos/PD_6'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
        $producto->nombre = Input::get('nombreP');
        $producto->tiempo_uso= Input::get('tiempo_uso_a');
        $producto->antiguedad = Input::get('antiguedad_a');
        if(Input::has('descripcion_a'))
        {
          $producto->descripcion = Input::get('descripcion_a');
        }
				if(Input::has('cCat'.$pdid))
				{
					$c = Input::get('categoriaCambio');
					if ($c == 'Electrodomésticos') {
						if (Input::has('marca') && Input::has('tipo')) {
							$categoria->marca = Input::get('marca');
							$categoria->tipo = Input::get('tipo');
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Vehículos') {
						if(Input::has('placa') && Input::has('modelo') && Input::has('marca') && Input::has('km') && Input::has('color') && Input::has('comb'))
						{
							$categoria->placa = Input::get('placa');
							$categoria->modelo = Input::get('modelo');
							$categoria->marca = Input::get('marca');
							$categoria->km = Input::get('km');
							$categoria->color = Input::get('color');
							$categoria->combustible = Input::get('comb');
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}elseif ($c == 'Literatura') {
						if (Input::has('edicion') && Input::has('edtorial') && Input::has('autor')) {
							$categoria->edicion = Input::get('edicion');
							$categoria->editorial = Input::get('editorial');
							$categoria->autor = Input::get('autor');
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Arte') {
						if (Input::has('tipo') && Input::has('anio') && Input::has('autor')) {
							$categoria->tipo = Input::get('tipo');
							$categoria->año = Input::get('anio');
							$categoria->autor = Input::get('autor');
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}
					elseif ($c == 'Música') {
						if (Input::has('album') && Input::has('genero') && Input::has('autor')) {
							$categoria->album = Input::get('album');
							$categoria->genero = Input::get('genero');
							$categoria->autor = Input::get('autor');
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}
					elseif ($c == 'Inmuebles') {
						if (Input::has('dir') && Input::has('bano') && Input::has('room') && Input::has('anio')) {
							$categoria->direccion = Input::get('dir');
							$categoria->bano = Input::get('bano');
							$categoria->año = Input::get('anio');
							$categoria->alcobas = Input::get('room');
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Tablets/Teléfonos') {
						if (Input::has('marca') && Input::has('referencia') && Input::has('os')) {
							$categoria->marca = Input::get('marca');
							$categoria->referencia = Input::get('referencia');
							$categoria->os = Input::get('os');
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Computadores') {
						if (Input::has('marca') && Input::has('referencia') && Input::has('os')) {
							$categoria->marca = Input::get('marca');
							$categoria->referencia = Input::get('referencia');
							$categoria->os = Input::get('os');
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Consolas de Vidéo Juegos') {
						if (Input::has('marca') && Input::has('referencia') && Input::has('storage')) {
							$categoria->marca = Input::get('marca');
							$categoria->referencia = Input::get('referencia');
							$categoria->almacenamiento = Input::get('storage');
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}
				}else {
					if (Input::get('nombreCategoria') == "Electrodomésticos") {
						if(Input::has('marca') && Input::has('tipo')){
							$categoria->marca = Input::get('marca');
							$categoria->tipo = Input::get('tipo');
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if (Input::get('nombreCategoria') == "Vehículos") {
						if(Input::has('placa') && Input::has('modelo') && Input::has('marca') && Input::has('km') && Input::has('color') && Input::has('comb')){
							$categoria->placa = Input::get('placa');
							$categoria->modelo = Input::get('modelo');
							$categoria->marca = Input::get('marca');
							$categoria->km = Input::get('km');
							$categoria->color = Input::get('color');
							$categoria->combustible = Input::get('comb');
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if (Input::get('nombreCategoria') == "Literatura") {
						if(Input::has('edicion') && Input::has('editorial') && Input::has('autor')){
							$categoria->edicion = Input::get('edicion');
							$categoria->editorial = Input::get('editorial');
							$categoria->autor = Input::get('autor');
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if (Input::get('nombreCategoria') == "Arte") {
						if(Input::has('tipo') && Input::has('anio') && Input::has('autor')){
							$categoria->tipo = Input::get('tipo');
							$categoria->año = Input::get('anio');
							$categoria->autor = Input::get('autor');
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if (Input::get('nombreCategoria') == "Música") {
						if(Input::has('album') && Input::has('genero') && Input::has('autor')){
							$categoria->album = Input::get('album');
							$categoria->genero = Input::get('genero');
							$categoria->autor = Input::get('autor');
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if (Input::get('nombreCategoria') == "Inmuebles") {
						if(Input::has('bano') && Input::has('room') && Input::has('dir') && Input::has('anio')){
							$categoria->bano = Input::get('bano');
							$categoria->room = Input::get('room');
							$categoria->direccion = Input::get('dir');
							$categoria->año = Input::get('anio');
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if (Input::get('nombreCategoria') == "Tablets/Teléfonos") {
						if(Input::has('referencia') && Input::has('os') && Input::has('marca')){
							$categoria->referencia = Input::get('referencia');
							$categoria->os = Input::get('os');
							$categoria->marca = Input::get('marca');
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if (Input::get('nombreCategoria') == "Computadores") {
						if(Input::has('referencias') && Input::has('os') && Input::has('marca')){
							$categoria->referencia = Input::get('referencia');
							$categoria->os = Input::get('os');
							$categoria->marca = Input::get('marca');
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if (Input::get('nombreCategoria') == "Consolas de Vidéo Juegos") {
						if(Input::has('referencias') && Input::has('storage') && Input::has('marca')){
							$categoria->referencia = Input::get('referencia');
							$categoria->os = Input::get('storage');
							$categoria->marca = Input::get('marca');
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
				}

				$categoria->save();
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
        if(Input::get('categoria') != '' && Input::has('nombre') && Input::has('tiempo_uso') && Input::has('antiguedad') && Input::has('descripcion'))
        {
          $producto = new Producto;
          $user = Auth::user();
          $userid = $user->id;
          $producto->nombre = Input::get('nombre');
          $producto->id_usuario = $userid;
          $producto->tiempo_uso= Input::get('tiempo_uso');
          $producto->antiguedad = Input::get('antiguedad');
          $producto->descripcion = Input::get('descripcion');
					$cat = new Categoria();
					$c = Input::get('categoria');
					if ($c == 'Electrodomésticos') {
						if (Input::has('marca') && Input::has('tipo')) {
							$cat->marca = Input::get('marca');
							$cat->tipo = Input::get('tipo');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Vehículos') {
						if(Input::has('placa') && Input::has('modelo') && Input::has('marca') && Input::has('km') && Input::has('color') && Input::has('comb'))
						{
							$cat->placa = Input::get('placa');
							$cat->modelo = Input::get('modelo');
							$cat->marca = Input::get('marca');
							$cat->km = Input::get('km');
							$cat->color = Input::get('color');
							$cat->combustible = Input::get('comb');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}elseif ($c == 'Literatura') {
						if (Input::has('edicion') && Input::has('edtorial') && Input::has('autor')) {
							$cat->edicion = Input::get('edicion');
							$cat->editorial = Input::get('editorial');
							$cat->autor = Input::get('autor');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Arte') {
						if (Input::has('tipo') && Input::has('anio') && Input::has('autor')) {
							$cat->tipo = Input::get('tipo');
							$cat->año = Input::get('anio');
							$cat->autor = Input::get('autor');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}
					elseif ($c == 'Música') {
						if (Input::has('album') && Input::has('genero') && Input::has('autor')) {
							$cat->album = Input::get('album');
							$cat->genero = Input::get('genero');
							$cat->autor = Input::get('autor');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}
					elseif ($c == 'Inmuebles') {
						if (Input::has('dir') && Input::has('bano') && Input::has('room') && Input::has('anio')) {
							$cat->direccion = Input::get('dir');
							$cat->bano = Input::get('bano');
							$cat->año = Input::get('anio');
							$cat->alcobas = Input::get('room');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Tablets/Teléfonos') {
						if (Input::has('marca') && Input::has('referencia') && Input::has('os')) {
							$cat->marca = Input::get('marca');
							$cat->referencia = Input::get('referencia');
							$cat->os = Input::get('os');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Computadores') {
						if (Input::has('marca') && Input::has('referencia') && Input::has('os')) {
							$cat->marca = Input::get('marca');
							$cat->referencia = Input::get('referencia');
							$cat->os = Input::get('os');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Consolas de Vidéo Juegos') {
						if (Input::has('marca') && Input::has('referencia') && Input::has('storage')) {
							$cat->marca = Input::get('marca');
							$cat->referencia = Input::get('referencia');
							$cat->almacenamiento = Input::get('storage');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}
					$producto->save();
					if(Input::hasFile('fotoP'))
					{
						$foto = Input::file('fotoP');
						$foto->move('productos', 'PD_'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto= 'productos/PD_'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP2'))
					{
						$foto = Input::file('fotoP2');
						$foto->move('productos', 'PD_2'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto2= 'productos/PD_2'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP3'))
					{
						$foto = Input::file('fotoP3');
						$foto->move('productos', 'PD_3'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto3= 'productos/PD_3'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP4'))
					{
						$foto = Input::file('fotoP4');
						$foto->move('productos', 'PD_4'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto4= 'productos/PD_4'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP5'))
					{
						$foto = Input::file('fotoP5');
						$foto->move('productos', 'PD_5'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto5= 'productos/PD_5'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP6'))
					{
						$foto = Input::file('fotoP6');
						$foto->move('productos', 'PD_6'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto6= 'productos/PD_6'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					$cat->nombre_cat = $c;
					$cat->id_producto = $producto->id;
					$producto->save();
					$cat->save();
	        $cambio = 'Producto agregado satisfactoriamente';
	        return Redirect::to('misProductos')
	                ->with('agregarProductos', $cambio)
	                ->withInput();
        }
        $cambio = 'Producto no agregado por favor verifique cambios';
        return Redirect::to('misProductos')
                ->with('nAgregarProductos', $cambio)
                ->withInput();
      }
			public function eliminar(){
				$id = Input::get('idp');
				$producto = Producto::find($id);
				File::delete($producto->foto);
				File::delete($producto->foto2);
				File::delete($producto->foto3);
				File::delete($producto->foto4);
				File::delete($producto->foto5);
				File::delete($producto->foto6);
				Producto::where('id', $id)->delete();
				return Redirect::to('misProductos')
								->with('eliminado', 'Producto se eliminó satisfactoriamente')
								->withInput();
			}
			public function categoria($id)
			{
				$cat = Categoria::find($id);
			}
    }
