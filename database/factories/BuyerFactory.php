<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BuyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'image' => $this->faker->image($dir = null, $width = 640, $height = 480, $category = null, $fullPath = true, $randomize = true, $word = null),
            'code' => $this->faker->regexify('[0-9]{10}'),
        ];
    }
}
