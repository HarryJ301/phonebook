<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class NumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'user_id' => $this->faker->numberBetween(1,20)
        ];
    }
}
