<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\junctions\ProjectMemberSeeder;
use Database\Seeders\junctions\TaskAssigneeSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            ProjectSeeder::class,
            TaskSeeder::class,
            ProjectInviteSeeder::class,

            ProjectMemberSeeder::class, // junction
            TaskAssigneeSeeder::class // junction
        ]);
    }
}
