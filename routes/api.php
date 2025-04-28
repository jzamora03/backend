<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
    Route::get('/tasks/indicators', [TaskController::class, 'indicators']);
    Route::get('/tasks/Allindicators', [TaskController::class, 'Allindicators']);
    Route::get('/tasks/tasksCompletedByWeek', [TaskController::class, 'tasksCompletedByWeek']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
    Route::get('/getAllUsers', [TaskController::class, 'getAllUsers']);
    Route::put('/tasks/assign/{id}', [TaskController::class, 'assignTask']);
    Route::post('/tasks/{taskId}/assign-user', [TaskController::class, 'assignUser']);
});

