<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;


final class HealthController extends Controller
{
    /** GET /api/health
     * returns 200*/
    public function index(): JsonResponse
    {
        return response()->json(['message' => "Successful"], 200, []);
    }
}