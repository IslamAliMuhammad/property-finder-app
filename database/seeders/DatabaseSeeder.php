<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\GovernorateSeeder;
use Database\Seeders\CitySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            GovernorateSeeder::class,
            CitySeeder::class,
        ]);
    }
}
