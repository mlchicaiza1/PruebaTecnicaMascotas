<?php

namespace App\Services;

use App\Contracts\IAuthRepository;
use App\Dtos\AuthDto;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $authRepository;

    public function __construct(IAuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }


    public function findByEmail($email): ?AuthDto
    {
        return $this->authRepository->findByEmail($email);
    }

    public function register(AuthDto $data): ?AuthDto
    {
        return $this->authRepository->create($data);
    }

    public function meAuth(): ?AuthDto
    {
        return $this->authRepository->me();
    }

}
