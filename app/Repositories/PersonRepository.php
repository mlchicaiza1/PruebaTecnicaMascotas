<?php

namespace App\Repositories;

use App\Contracts\IPersonRepository;
use App\Models\Person;
use App\Dtos\PersonDto;

class PersonRepository extends BaseRepository implements IPersonRepository
{
    public function __construct(Person $model)
    {
        parent::__construct($model);
    }

    protected function getDtoClass(): string
    {
        return PersonDto::class;
    }
}
