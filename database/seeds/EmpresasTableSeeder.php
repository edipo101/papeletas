<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIS\Empresa::create([
			'nombre' => 'GOBIERNO AUTONOMO MUNICIPAL DE SUCRE',
			'sigla' => 'G.A.M.S.',
			'slogan' => 'Capital Constitucional del Estado Plurinacional de Bolivia',
			'logo' => 'gams.jpg',
			'direccion' => 'Av. del Ejercito # 152',
			'zona' => 'Palacete Municipal El Guereo',
			'telefono' => '64-56185 / 64-39769',
			'email' => 'gamsucre@sucre.bo'
		]);
    }
}
