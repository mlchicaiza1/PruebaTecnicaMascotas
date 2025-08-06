<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DentalController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;



Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
//Route::apiResource('dental', DentalController::class);

// Rutas individuales para DentalController
Route::get('dental-list', [DentalController::class, 'index']);           // Listar todos
Route::post('dental', [DentalController::class, 'store']);          // Crear nuevo
Route::get('dental/{dental}', [DentalController::class, 'show']);   // Mostrar uno
Route::put('dental/{dental}', [DentalController::class, 'update']); // Actualizar uno
Route::patch('dental/{dental}', [DentalController::class, 'update']); // Actualizar parcialmente
Route::delete('dental/{dental}', [DentalController::class, 'destroy']); // Eliminar uno


 Route::middleware('auth')->group(function () {
        Route::get('/user', [AuthController::class, 'me']);

        Route::apiResource('person', PersonController::class);
        Route::get('/person/{id}/pet', [PersonController::class, 'personWithPet']);

        Route::apiResource('pet', PetController::class);
});
