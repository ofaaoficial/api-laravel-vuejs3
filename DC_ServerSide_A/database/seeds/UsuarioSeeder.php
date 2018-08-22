<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'name' => 'administrador',
            'email' => 'admin@colombia.co',
            'password' => bcrypt('adminpass'),
            'role' => 'administrador'
        ]);

        Usuario::create([
            'name' => 'turista1',
            'email' => 'turista1@gmail.com',
            'password' => bcrypt('adminpass'),
            'role' => 'turista',
        ]);
    }
}
