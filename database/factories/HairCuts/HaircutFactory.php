<?php

namespace Database\Factories\HairCuts;

use App\Models\HairCuts\Haircut;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<Haircut>
 */
class HaircutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'hair_cut_category_id' => $this->faker->numberBetween(1, 10),
            'image' => fake()->text(10),
        ];
    }
}
