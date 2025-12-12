<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public pet routes
Route::get('/pets', [PetController::class, 'index']);
Route::get('/pets/{pet}', [PetController::class, 'show']);
Route::get('/pets/available', [PetController::class, 'apiGetAvailable']);
Route::get('/pets/type/{type}', [PetController::class, 'apiGetByType']);
Route::get('/pets/search', [PetController::class, 'apiSearch']);
Route::get('/pets/stats', [PetController::class, 'apiStats']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    
    // Pets (admin)
    Route::post('/pets', [PetController::class, 'store']);
    Route::put('/pets/{pet}', [PetController::class, 'update']);
    Route::delete('/pets/{pet}', [PetController::class, 'destroy']);
    
    // Adoptions
    Route::get('/adoptions', [AdoptionController::class, 'index']);
    Route::get('/adoptions/{id}', [AdoptionController::class, 'show']);
    Route::post('/adoptions/submit', [AdoptionController::class, 'submit']);
    Route::put('/adoptions/{id}/approve', [AdoptionController::class, 'approve']);
    Route::put('/adoptions/{id}/reject', [AdoptionController::class, 'reject']);
    Route::get('/adoptions/user/mine', [AdoptionController::class, 'userAdoptions']);
    Route::get('/adoptions/stats', [AdoptionController::class, 'stats']);
});