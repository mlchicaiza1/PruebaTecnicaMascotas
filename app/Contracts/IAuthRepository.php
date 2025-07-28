<?php

namespace App\Contracts;

use App\Dtos\AuthDto;

interface IAuthRepository
{
    public function findByEmail(string $email): ?AuthDto;
    public function create(AuthDto $authDto): AuthDto;

    public function me(): AuthDto;

}
