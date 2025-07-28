<?php

namespace App\Dtos;

use Spatie\LaravelData\Data;
use Carbon\Carbon;

class AuthDto extends Data
{

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $email = null,
        public ?string $password = null,
        public ?string $token = null,
    )
    {}

}
