<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quantity = 50;
        $this->command->info('Creating projects...');

        Project::factory()->count($quantity)->create();
        $this->command->info("{$quantity} projects created.");
    }
}
