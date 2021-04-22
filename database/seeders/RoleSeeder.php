<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'nombre' => 'admin'
            ],
            [
                'id' => 2,
                'nombre' => 'comercial'
            ],
            [
                'id' => 3,
                'nombre' => 'promocional'
            ]
        ]);
    }
}
