<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Staff;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Supplier::factory()->count(3)->create();
        Category::factory()
            ->has(
                Product::factory()
                    ->count(5)
            )
            ->count(3)
            ->create();
        Staff::factory()->count(5)->create();

    }
}
