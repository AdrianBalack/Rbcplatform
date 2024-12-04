<?php

namespace Database\Factories;

use App\Enums\ContributionStatus;
use App\Models\Project;
use App\Models\Reward;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contribution>
 */
class ContributionFactory extends Factory
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
            'project_id' => Project::factory(),
            'reward_id' => Reward::factory(),

            'amount' => $this->faker->numberBetween(10, 500),
            'status' => $this->faker->randomElement(ContributionStatus::class),
        ];
    }
}
