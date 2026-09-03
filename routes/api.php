<?php

use App\Http\Controllers\api\HealthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

// The API is by RESTful design, so we use the HTTP verbs GET, POST, PUT and DELETE to perform CRUD operations on resources.

// Auth routes
Route::get('/health', [HealthController::class, 'index']);