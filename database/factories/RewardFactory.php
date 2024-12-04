<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reward>
 */
class RewardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'amount' => $this->faker->numberBetween(10, 500),
            'limited_quantity' => $this->faker->numberBetween(1, 100),
            'estimated_delivery' => $this->faker->dateTime(),
        ];
    }
}