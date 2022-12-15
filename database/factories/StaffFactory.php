<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class StaffFactory extends Factory
{
    public function definition()
    {
        return [
            "staff_id" => "S".$this->faker->randomNumber(2),
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "gender" => $this->faker->randomElement(["M","F"]),
            "birthday" => $this->faker->date("Y-m-d", "-30 years"),
            "address" => $this->faker->address(),
            "phone" => $this->faker->randomNumber(8),
            "email" => $this->faker->safeEmail(),
            "username" => $this->faker->name(),
            "password" => Hash::make("12345678"),
        ];
    }
}
