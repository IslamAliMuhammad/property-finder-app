<?php

namespace Database\Factories;

use App\Models\Land;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class LandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Land::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::factory(),
            'title' => $this->faker->realText(70),
            'land_type_id' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->randomFloat(2, 100000, 800000) ,  
            'area' => $this->faker->numberBetween(100, 100000),
            'payment_option_id' => $this->faker->numberBetween(1, 3),
            'for_sale' => $this->faker->boolean(),
            'description' => $this->faker->realText(4096),
            'city_id' => $this->faker->numberBetween(1, 250),
            'address' => $this->faker->address(),
        ];
    }
}
