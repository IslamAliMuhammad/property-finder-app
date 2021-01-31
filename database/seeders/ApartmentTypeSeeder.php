<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApartmentType;

class ApartmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        ApartmentType::create([
            'type' => 'Apartment',
        ]);

        ApartmentType::create([
            'type' => 'Duplex',
        ]);

        ApartmentType::create([
            'type' => 'Penthouse',
        ]);

        ApartmentType::create([
            'type' => 'Room',
        ]);

        ApartmentType::create([
            'type' => 'Studio',
        ]);
    }
}
