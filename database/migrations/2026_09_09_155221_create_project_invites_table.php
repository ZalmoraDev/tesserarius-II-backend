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
        Schema::create('project_invites', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreignUuid('invited_by')->references('id')->on('users')->onDelete('cascade');

            $table->string('email', 255);
            $table->string('token', 64)->unique();

            $table->enum('role', ['member', 'admin', 'owner']);
            $table->enum('status', ['pending', 'accepted', 'declined', 'expired'])->default('pending');

            $table->timestamp('expires_at');
            $table->timestamp('accepted_at')->nullable();
            $table->timestamps(); // created_at & updated_at
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
