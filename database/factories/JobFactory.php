<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'salary' => '$943243',
            'description' => fake()->paragraph(),
            'job_tier' => fake()->randomElement(['Common', 'Uncommon', 'Kinda mid', 'Epic', 'Legendary', 'Godlike'])
        ];
    }
}
