<?php

namespace App\Dtos;

use Spatie\LaravelData\Data;
use Carbon\Carbon;

class PetDto extends Data
{

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $species = null,
        public ?string $breed = null,
        public ?int $age = null,
        public ?string $temperament = null,
        public ?string $origin = null,
        public ?string $imageUrl=null,
        public ?int $personId = null,
        public ?Carbon $createdAt = null,
        public ?Carbon $updatedAt = null,
    )
    {}

}
