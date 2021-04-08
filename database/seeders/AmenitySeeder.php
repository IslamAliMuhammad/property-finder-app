<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $amenities = array_map('str_getcsv', file('resources/csv/amenities.csv'));

        foreach($amenities as $amenity) {
            Amenity::create([
                'amenity' => $amenity[1],
            ]);
        }
    }
}
