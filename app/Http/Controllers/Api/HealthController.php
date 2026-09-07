<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

final readonly class HealthController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json("I'm a teacup", 418, []);
    }
}
