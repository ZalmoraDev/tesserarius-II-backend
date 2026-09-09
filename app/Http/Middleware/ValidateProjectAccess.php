<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

/** Ensure the requesting user has the correct access to retrieve project related endpoints, like:
 ** Tasks
 ** Projects
 ** ProjectMembers
 */
class ValidateProjectAccess
{
    public function handle(Request $request, Closure $next, string $required): Response
    {
        $project = $request->route('project');
        $role = $project->roleOf(auth()->user());          // ?UserRole from project_members pivot

        if ($role === null)                                 // your "not a member" case
            abort(403, 'Not a project member');

        if (AccessRole::from($required)->value > $role->toAccessRole()->value)  // your exact comparison
            abort(403, 'Insufficient permissions');

        return $next($request);
    }
}