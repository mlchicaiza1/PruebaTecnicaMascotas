<?php

namespace App\Dtos;


use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;
use Spatie\LaravelData\Data;
use Carbon\Carbon;
use DateTimeInterface;
use Spatie\LaravelData\Attributes\WithCast;

class PersonDto extends Data
{

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $email = null,
        #[WithCast(DateTimeInterfaceCast::class, type: Carbon::class, format: 'Y-m-d')]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d')]
        public ?Carbon $birthDate = null,
        public ?string $address = null,
        public ?string $phone = null,
        public ?Carbon $createdAt = null,
        public ?Carbon $updatedAt = null,

        /** @var PetDto[] */
        public ?array $pets=null,
    )
    {}
}
