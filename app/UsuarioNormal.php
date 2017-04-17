<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
* Modelo que representa un usuarioNormal dentro de el sistema
* Aqui las relaciones hacia los productos que son diferentes para cada usuario
**/
class UsuarioNormal extends User
{
  public function productosPropios()
  {
    return $this->hasMany('App\Producto');
  }
  public function productosTrueque()
  {
    return $this->hasMany('App\Producto');
  }
}
