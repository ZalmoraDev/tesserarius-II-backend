<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /** GET /api/projects
     * Display many resources
     * returns 200*/
    public function index(): JsonResponse
    {
        return response()->json(Project::all(), 200, []);
    }

    /** POST /api/projects
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request): JsonResponse
    {
        $project = new Project;
        $project->ownerId = $request->user()->id; // TODO: GET user UUID from session?
        $project->save();

        return response()->json(null, 201);
    }

    /** GET /api/project
     * Display the specified resource.
     */
    public function show(Project $project): JsonResponse
    {
        return response()->json(null, 501);
    }

    /** PATCH /api/projects
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project): JsonResponse
    {
        return response()->json(null, 501);
    }

    /** DELETE /api/projects
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): JsonResponse
    {
        return response()->json(null, 501);
    }
}
