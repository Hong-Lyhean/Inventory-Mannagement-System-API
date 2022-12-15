<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class SupplierFactory extends Factory
{
    public function definition()
    {
        return [
            "name" => $this->faker->company(),
            "address" => $this->faker->address(),
            "phone" => $this->faker->unique()->randomNumber(8),
            "fax" => $this->faker->randomNumber(4),
            "email" => $this->faker->safeEmail(),
            "other_detail" => $this->faker->sentence(5)
        ];
    }
}
