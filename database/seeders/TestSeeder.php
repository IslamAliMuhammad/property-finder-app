<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\ApartmentPhoto;
use App\Models\Villa;
use App\Models\VillaPhoto;
use App\Models\Amenity;
use App\Models\User;
use App\Models\Land;
use App\Models\LandPhoto;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::factory()->count(10)->create();
        $amenities = Amenity::all();

        foreach($users as $user){

            $apartments = Apartment::factory()->count(5)->create([ 'user_id' => $user->id ]);
            foreach($apartments as $apartment){
                ApartmentPhoto::factory()->count(6)->create([ 'apartment_id' => $apartment->id ]);
                $apartment->amenities()->attach($amenities);
            }

            $villas = Villa::factory()->count(5)->create([ 'user_id' => $user->id ]);
            foreach($villas as $villa){
                VillaPhoto::factory()->count(6)->create([ 'villa_id' => $villa->id ]);
                $villa->amenities()->attach($amenities);
            }

            $lands = Land::factory()->count(5)->create(['user_id' => $user->id]);
            foreach($lands as $land) {
                LandPhoto::factory()->count(5)->create(['land_id' => $land->id]);
            }
        }

    }
}
