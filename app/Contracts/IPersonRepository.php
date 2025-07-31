<?php

namespace App\Contracts;

use App\Dtos\PersonDto;
use App\Dtos\FilterDTO;

interface IPersonRepository
{
    public function all(array $relations = [],FilterDTO $filterDto): array;
    public function findById($id,array $relations = []);
    public function create(PersonDto $data);
    public function update($id, PersonDto $data) ;
    public function delete($id): bool;

}
