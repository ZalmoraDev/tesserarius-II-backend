<?php

namespace Database\Factories;

use App\Enums\ProjectInviteStatus;
use App\Enums\ProjectRole;
use App\Models\Project;
use App\Models\projectInvite;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<projectInvite>
 */
class ProjectInviteFactory extends Factory
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
            'invited_by' => User::factory(),

            'email' => fake()->unique()->safeEmail(),
            'token' => fake()->sha256(), // random 64 chars
            'role' => ProjectRole::cases()[array_rand(ProjectRole::cases())],
            'status' => ProjectInviteStatus::cases()[array_rand(ProjectInviteStatus::cases())],

            'expires_at' => fake()->dateTimeBetween('now', '+1 year'),
            'accepted_at' => fake()->dateTimeBetween('now', '+1 year')
        ];
    }
}
