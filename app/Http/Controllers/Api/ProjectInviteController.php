<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectInvite\StoreprojectInviteRequest;
use App\Http\Requests\ProjectInvite\UpdateprojectInviteRequest;
use App\Models\ProjectInvite;
use Illuminate\Http\JsonResponse;

class ProjectInviteController extends Controller
{
    /** GET /api/projects
     * Display many resources
     * returns 200*/
    public function index(): JsonResponse
    {
        return response()->json(ProjectInvite::all(), 200, []);
    }

    /** POST /api/projectinvites
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectInviteRequest $request): JsonResponse
    {
        // TODO: Fix statements for projectinvite, taken from 'project'
        $projectInvite = new ProjectInvite;
        $projectInvite->ownerId = $request->user()->id;
        $projectInvite->save();

        return response()->json(null, 201);
    }

    /** GET /api/projectinvite
     * Display the specified resource.
     */
    public function show(ProjectInvite $projectInvite): JsonResponse
    {
        return response()->json(null, 501);
    }

    /** PATCH /api/projectinvites
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectInviteRequest $request, ProjectInvite $projectInvite): JsonResponse
    {
        return response()->json(null, 501);
    }

    /** DELETE /api/projectinvites
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectInvite $projectInvite): JsonResponse
    {
        return response()->json(null, 501);
    }
}
