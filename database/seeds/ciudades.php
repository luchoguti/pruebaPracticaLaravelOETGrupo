<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ciudades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert([
            'nom_ciudad' => str_random(20),
        ]);
    }
}
