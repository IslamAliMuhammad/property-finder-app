<?php

namespace Database\Factories;

use App\Models\ApartmentPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Apartment;

class ApartmentPhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApartmentPhoto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'apartment_id' => Apartment::factory(),
            'photo_path' => $this->faker->imageUrl(640, 480, 'Ad', true),
        ];
    }
}
