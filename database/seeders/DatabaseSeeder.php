<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PromocionesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MarketingSeeder::class);
        $this->call(UserMarketing::class);
       
    }
}
