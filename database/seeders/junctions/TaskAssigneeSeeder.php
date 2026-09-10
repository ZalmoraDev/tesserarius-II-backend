<?php

namespace Database\Seeders\junctions;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskAssigneeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: only create 'x' amount of entries, not all
        $users = User::all();

        // For each Task assign 3 random User ID's for `user_id` field
        $this->command->info('Creating task_assignees (junction table, Users <-> Tasks)...');
        Task::all()->each(function (Task $task) use ($users) {
            $task->taskAssignees()->attach(
                $users->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        $this->command->info('task_assignees created...');
    }
}