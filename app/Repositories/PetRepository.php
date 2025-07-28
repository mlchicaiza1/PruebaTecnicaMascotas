<?php

namespace App\Repositories;

use App\Contracts\IPetRepository;
use App\Models\Pet;
use App\Dtos\PetDto;

class PetRepository extends BaseRepository implements IPetRepository
{
    public function __construct(Pet $model)
    {
        parent::__construct($model);
    }

    protected function getDtoClass(): string
    {
        return PetDto::class;
    }
}
