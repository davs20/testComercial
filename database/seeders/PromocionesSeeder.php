<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromocionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promociones')->insert([
            [
                'id' => 1,
                'nombre' => 'Promocion 1',
            ], [
                'id' => 2,
                'nombre' => 'Promocion 2',
               
            ]
        ]);
    }
}
