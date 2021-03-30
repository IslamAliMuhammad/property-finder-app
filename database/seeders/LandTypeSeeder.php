<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LandType;

class LandTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        LandType::create([
            'type' => 'Agricultural'
        ]);

        LandType::create([
            'type' => 'Any Use'
        ]);

        LandType::create([
            'type' => 'Commercial'
        ]);

        LandType::create([
            'type' => 'Industrial'
        ]);

        LandType::create([
            'type' => 'Residential'
        ]);

    }
}
