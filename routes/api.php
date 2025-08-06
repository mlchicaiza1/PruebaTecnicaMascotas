<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;



Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

 Route::middleware('auth')->group(function () {
        Route::get('/user', [AuthController::class, 'me']);

        Route::apiResource('person', PersonController::class);
        Route::get('/person/{id}/pet', [PersonController::class, 'personWithPet']);

        Route::apiResource('pet', PetController::class);
});
