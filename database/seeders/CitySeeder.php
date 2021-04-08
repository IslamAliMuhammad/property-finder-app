<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cities = array_map('str_getcsv', file('resources/csv/cities.csv'));
        foreach($cities as $city) {
            City::create([
                'gov_id' => $city[1],
                'city_name' => $city[2],
            ]);
        }

    }
}
