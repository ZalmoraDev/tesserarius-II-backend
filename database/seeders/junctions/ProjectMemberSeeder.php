<?php

namespace Database\Seeders\junctions;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: only create 'x' amount of entries, not all
        $users = User::all();

        // For each Project assign 3 random User ID's for `user_id` field
        $this->command->info('Creating project_members (junction table, Users <-> Projects)...');
        Project::all()->each(function (Project $project) use ($users) {
            $project->projectMembers()->attach(
                $users->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        $this->command->info('project_members created...');
    }
}