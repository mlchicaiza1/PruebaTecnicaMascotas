<?php

use App\Http\Middleware\JwtMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use Illuminate\Http\Request; // Asegúrate de importar Request
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Auth\AuthenticationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //$middleware->append(JwtMiddleware::class);
        $middleware->alias([
        'auth' => JwtMiddleware::class
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
         $exceptions->render(function (Throwable $exception, Request $request) {
            if ($request->is('api/*')) {
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
        });
    })->create();
