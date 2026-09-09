<?php

use App\Models\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->string('title')->nullable();
            $table->string('description')->nullable();

            $table->enum('status', ['Backlog', 'ToDo', 'Doing', 'Review', 'Done'])->default('Backlog');
            $table->enum('priority', ['None', 'Low', 'Medium', 'High'])->default('None');

            $table->foreignUuid('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('assignee_id')->nullable()->references('id')->on('users')->onDelete('set null');

            $table->timestamp('due_at')->nullable();
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
