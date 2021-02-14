<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\ApartmentPhoto;
use App\Models\Amenity;
use App\models\User;

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
        $amenity = Amenity::all();

        foreach($users as $user){
            $apartments = Apartment::factory()->count(5)->create([ 'user_id' => $user->id ]);

            foreach($apartments as $apartment){
                ApartmentPhoto::factory()->count(6)->for($apartment, 'apartment')->create([ 'apartment_id' => $apartment->id ]);
                $apartment->amenities()->attach($amenity);
            }
        }

    }
}
