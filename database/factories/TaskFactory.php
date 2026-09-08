<?php

namespace Database\Factories;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
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
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'status' => TaskStatus::cases()[array_rand(TaskStatus::cases())],
            'priority' => TaskPriority::cases()[array_rand(TaskPriority::cases())],
            'creator_id' => User::factory(),
            'assignee_id' => User::factory(),
            'due_at' => $this->faker->optional()->dateTimeBetween('now', '+1 year')
        ];
    }
}
