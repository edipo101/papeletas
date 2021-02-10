<?php

use Illuminate\Database\Seeder;

class ModalidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIS\Modalidad::create([
            'nombre' => 'Planta',
            'activo' => 1
        ]);

        SIS\Modalidad::create([
            'nombre' => 'Eventual',
            'activo' => 1
        ]);

    }
}
