<?php

namespace Database\Factories;

use App\Models\LandPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Land;

class LandPhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LandPhoto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'land_id' => Land::factory(),
            'photo_path' => $this->faker->imageUrl(640, 480, 'Ad', true),
        ];
    }
}
