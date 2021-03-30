<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillaType;

class VillaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        VillaType::create([
            'type' => 'Stand Alone Villa',
        ]);

        VillaType::create([
            'type' => 'Town House',
        ]);

        VillaType::create([
            'type' => 'Twin House',
        ]);

    }
}
