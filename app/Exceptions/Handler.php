<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    protected $levels = [];

    protected $dontReport = [];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {

    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $exception->errors(),
            ], 422);
        }

        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Recurso no encontrado',
            ], 404);
        }

        if ($exception instanceof TokenInvalidException ||
            $exception instanceof TokenExpiredException ||
            $exception instanceof JWTException ||
            $exception instanceof AuthenticationException) {
            return response()->json([
                'message' => 'No autenticado o token inválido',
            ], 401);
        }

        return response()->json([
            'message' => 'Error interno del servidor',
            'error' => config('app.debug') ? $exception->getMessage() : 'Ocurrió un error inesperado',
        ], 500);
    }
}
