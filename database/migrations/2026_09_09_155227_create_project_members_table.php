<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Junction table
        Schema::create('project_members', function (Blueprint $table) {
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->primary(['user_id', 'project_id']);

            $table->enum('role', ['member', 'admin', 'owner'])->default('member');
            $table->enum('status', ['pending', 'accepted', 'declined', 'expired'])->default('pending');

            $table->timestamp('joined_at')->default(now()); // Same logic as created_at
            $table->timestamp('updated_at')->default(now()); // TODO: maybe remove default(now), null constraint on relation
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_invites');
    }
};