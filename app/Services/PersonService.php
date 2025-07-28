<?php

namespace App\Services;

use App\Contracts\IPersonRepository;
use App\Dtos\PersonDto;

class PersonService
{
    protected $personRepository;

    public function __construct(IPersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getAllPersons(): array
    {
        return $this->personRepository->all();
    }

    public function findPersonById($id,array $relations = []): ?PersonDto
    {
        return $this->personRepository->findById($id,$relations);
    }

    public function createPerson(PersonDto $data): ?PersonDto
    {
        return $this->personRepository->create($data);
    }

    public function updatePerson($id, PersonDto $data): ?PersonDto
    {
        return $this->personRepository->update($id, $data);
    }

    public function deletePerson($id):bool
    {
        return $this->personRepository->delete($id);
    }
}
