<?php

use Illuminate\Database\Seeder;

class PapeletasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SIS\Papeleta::class,100)->create();
    }
}
