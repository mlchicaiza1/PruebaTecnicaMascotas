<?php

namespace App\Contracts;

use App\Dtos\PersonDto;

interface IPersonRepository
{
    public function all(): array;
    public function findById($id,array $relations = []);
    public function create(PersonDto $data);
    public function update($id, PersonDto $data) ;
    public function delete($id): bool;

}
