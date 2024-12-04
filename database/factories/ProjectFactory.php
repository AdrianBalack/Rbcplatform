<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'goal_amount' => $this->faker->numberBetween(1000, 10000),
            'current_amount' => $this->faker->numberBetween(0, 10000),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTimeThisMonth(),
            'status' => $this->faker->randomElement(ProjectStatus::class),
            'category' => $this->faker->company(),
        ];
    }
}
