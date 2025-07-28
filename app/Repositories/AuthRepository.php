<?php

namespace App\Repositories;

use App\Contracts\IAuthRepository;
use App\Models\User;
use App\Dtos\AuthDto;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthRepository  implements IAuthRepository
{
	public function findByEmail(string $email): ?AuthDto
	{
		$auth = User::where('email', $email)->first();
		return $auth ? new AuthDto($auth->id) : null;

	}

	public function create(AuthDto $authDto): AuthDto
	{
		$auth = User::create($authDto->toArray());
        $token = JWTAuth::fromUser($auth);
		return $auth ? new AuthDto($auth->id, $auth->name,$auth->email, '',$token) : null;
	}

    public function me(): AuthDto
    {
        $user = Auth::user();
        if (!$user) {
            throw new \RuntimeException('No authenticated user found.');
        }
        return new AuthDto($user->id,$user->name, $user->email);
    }


}
