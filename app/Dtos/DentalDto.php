<?php

namespace App\Dtos;

use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Carbon\Carbon;

class DentalDto extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $contractId = null,
        #[WithCast(DateTimeInterfaceCast::class, type: Carbon::class, format: 'Y-m-d')]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d')]
        public ?Carbon $startDate = null,
        #[WithCast(DateTimeInterfaceCast::class, type: Carbon::class, format: 'Y-m-d')]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d')]
        public ?Carbon $endDate = null,
        public ?int $contractorId = null,
        public ?string $insuredName = null,
        public ?string $identification = null,
        public ?int $affiliateTypeId = null,
        public ?int $familyCompositionId = null,
        public ?int $serviceId = null,
        public ?string $holderId = null,
        public ?array $dependents = null,
        public ?string $registrationCode = null,
        public ?Carbon $createdAt = null,
        public ?Carbon $updatedAt = null,
    ) {}
}
