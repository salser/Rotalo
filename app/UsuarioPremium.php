<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPremium extends User
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
