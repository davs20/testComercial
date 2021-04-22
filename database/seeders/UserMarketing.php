<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserMarketing extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campana_marketing_users')->insert([
            [
                'id' => 1,
                'user_id' => 3,
                'campana_id' => 1
            ]
        ]);
    }
}
