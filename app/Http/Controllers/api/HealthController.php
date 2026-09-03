<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class HealthController extends Controller
{
    public function index(): JsonResponse
    {
        // TODO: Actually make this a health check, return code 200
        return response()->json("HEALTHY CHECK");
    }
}
