<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StoryController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public stories routes (bisa diakses tanpa login)
Route::get('/stories', [StoryController::class, 'index']);
Route::get('/stories/{story}', [StoryController::class, 'show']);

// Protected routes (butuh authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    // Stories - operations yang butuh authentication
    Route::get('/my-stories', [StoryController::class, 'myStories']);
    Route::post('/stories', [StoryController::class, 'store']);
    Route::put('/stories/{story}', [StoryController::class, 'update']);
    Route::patch('/stories/{story}', [StoryController::class, 'update']);
    Route::post('/stories/{story}', [StoryController::class, 'update']); // POST untuk multipart/flutter
    Route::delete('/stories/{story}', [StoryController::class, 'destroy']);
});