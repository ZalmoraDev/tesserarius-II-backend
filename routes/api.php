<?php

use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/health', HealthController::class) -> only(['index']);

Route::apiResource('/tasks', TaskController::class);
Route::apiResource('/projects', ProjectController::class);