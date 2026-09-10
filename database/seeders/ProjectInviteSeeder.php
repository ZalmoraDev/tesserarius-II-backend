<?php

namespace Database\Seeders;

use App\Models\ProjectInvite;
use Illuminate\Database\Seeder;

class ProjectInviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quantity = 50;
        $this->command->info('Creating project invites...');

        ProjectInvite::factory()->count($quantity)->create();
        $this->command->info("{$quantity} projects invites created.");
    }
}
