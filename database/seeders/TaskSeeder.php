<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quantity = 50;
        $this->command->info('Creating tasks...');

        Task::factory()->count($quantity)->create();
        $this->command->info("{$quantity} tasks created.");
    }
}
