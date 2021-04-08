<?php

namespace Database\Factories;

use App\Models\VillaPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Villa;
class VillaPhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VillaPhoto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'villa_id' => Villa::factory(),
            'photo_path' => $this->faker->imageUrl(640, 480, 'Ad', true),
        ];
    }
}
