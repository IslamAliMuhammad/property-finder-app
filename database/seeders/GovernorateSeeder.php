<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Governorate;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $governorates = array_map('str_getcsv', file('resources/csv/governorates.csv'));

        foreach($governorates as $governorate) {
            Governorate::create([
                'governorate_name' => $governorate[1],
            ]);
        }
        
    }

}
