<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            "name" => $this->faker->firstName(),
            "description" => $this->faker->sentence(5),
            "unit" => $this->faker->safeColorName(),
            "price" => $this->faker->randomFloat(2,2, 100),
            "quantity" => $this->faker->randomNumber(2),
            "supplier_id" => $this->faker->randomElement([1,2,3]),
        ];
    }
}
