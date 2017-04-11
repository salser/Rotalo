<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
class SeederTablaUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
					'username' 		=> 'henry7',
					'correo'			=> 'henry2s@rotalo.com',
					'nombre'			=> 'Henry',
					'apellido'		=> 'Salazar',
					'password'	  => Hash::make('rotalo'),
          'foto'        => "No foto aun",
					'telefono'		=> '3186346954'
				));
    }
}


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::reguard();

				$this->call(SeederTablaUsuario::class);
    }
}


class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('producto')->truncate();
      factory(App\Producto::class)->create([
        'nombre'        =>'Nuevo Producto',
        'tiempo_uso'    =>'admin',
        'antiguedad'    => 'admin@admin.com',
        'foto'          => 'nohay',
        'descripcion'   =>'1'
      ]);
      factory(App\Producto::class, 49)->create();
    }
}
?>
