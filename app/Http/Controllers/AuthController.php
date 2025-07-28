<?php

namespace App\Http\Controllers;

use App\Dtos\AuthDto;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request): JsonResponse
    {

        $user = $this->authService->register(AuthDto::from([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));


        return response()->json([
            'message' => 'Usuario registrado correctamente',
            'user' => $user,
        ], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => ' Credenciales inválidas '], 401);
        }

        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'token' => $token
        ]);
    }

    public function me(): JsonResponse
    {
        return response()->json([
            'message' => 'Usuario autenticado',
            'me' =>   $this->authService->meAuth()
        ]);
    }
}
