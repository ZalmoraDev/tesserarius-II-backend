<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;


final class TaskController extends Controller
{
    /** GET /api/tasks
     * Display many resources
     * returns 200*/
    public function index(): JsonResponse
    {
        return response()->json(Task::all(), 200, []);
    }

    /** POST /api/tasks
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = new Task;
        $task->save();

        return response()->json(null, 201);
    }

    /** GET /api/task
     * Display the specified resource.
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json(null, 501);
    }

    /** PATCH /api/tasks
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        return response()->json(null, 501);
    }

    /** DELETE /api/tasks
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): JsonResponse
    {
        return response()->json(null, 501);
    }
}