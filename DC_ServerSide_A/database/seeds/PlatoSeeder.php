<?php

use Illuminate\Database\Seeder;
use App\Plato;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plato::create([
            'name' => 'Distrito Capital',
            'description' => 'sin descripcion',
            'image' => 'localhost/imgs/prueba.jpg',
            'region_id' => 1,
        ]);
    }
}
