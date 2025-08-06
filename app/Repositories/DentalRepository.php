<?php

namespace App\Repositories;

use App\Contracts\IDentalRepository;
use App\Models\Dental;
use App\Dtos\DentalDto;

class DentalRepository extends BaseRepository implements IDentalRepository
{
    public function __construct(Dental $model)
    {
        parent::__construct($model);
    }

    protected function getDtoClass(): string
    {
        return DentalDto::class;
    }
}
