<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_title' => fake()->jobTitle(),
            'salary' => '$67',
            'description' => fake()->paragraph(),
            'job_tier' => fake()->randomElement(['Common', 'Uncommon', 'Kinda mid', 'Epic', 'Legendary', 'Godlike']),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
