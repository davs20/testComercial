<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'David Delcid',
            'email' => 'david_delcid21@outlook.com',
            'nombre_usuario' => 'davs20',
            'rol_id' => 1,
            'created_at' => '2021-04-21 12:43:18',
            'promocion_tipo' => null,
            'telefono' => '50497439936',
            'password' => bcrypt('marvelita2020')
        ], [
            'name' => 'Rubilio Castillo',
            'email' => 'rubilios@outlook.com',
            'nombre_usuario' => 'rubi',
            'rol_id' => 2,
            'created_at' => '2021-04-21 12:43:18',
            'promocion_tipo' => null,
            'telefono' => '97439936',
            'password' => bcrypt('123456')
        ],
        [
            'name' => 'Armando',
            'email' => 'rubilio_armando@outlook.com',
            'nombre_usuario' => 'armando',
            'created_at' => '2021-04-21 12:43:18',
            'rol_id' => 3,
            'promocion_tipo' => 1,
            'telefono' => '447778936',
            'password' => bcrypt('123456')
        ]]);
    }
}
