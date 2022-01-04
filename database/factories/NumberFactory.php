<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;
use App\Models\Number;
use App\Models\User;

class NumberFactory extends Factory
{
    protected $model = Number::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'last_name' => $this->faker->lastName(),
            'maiden_name' => $this->faker->lastName(),
            'phone_number' => $this->faker->phoneNumber(),
            'mobile_number' => $this->faker->phoneNumber(),
            'birthday' => $this->faker->date(),
            'email' => $this->faker->email(),
            'occupation' => $this->faker->jobTitle(),
            'url' => $this->faker->url(),
            'other_names' => $this->faker->firstName(),
            'notes' => $this->faker->realText(),
        ];
    }
}
