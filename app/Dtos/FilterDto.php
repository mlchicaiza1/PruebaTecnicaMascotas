<?php

namespace App\Dtos;

use Spatie\LaravelData\Data;

class FilterDTO extends Data
{
    public function __construct(
        public ?array $filters=[],
        public ?int $perPage = null,
        public ?int $page = null,
        public ?bool $paginate = true,
    ) {}
}
