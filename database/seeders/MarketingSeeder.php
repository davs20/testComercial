<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campana_marketing')->insert([[
            'id' => 1,
            'nombre' => 'coca-cola-2021'
        ]]);
    }
}
