<?php

namespace App\Contracts;

use App\Dtos\PetDto;
use App\Dtos\FilterDTO;

interface IPetRepository
{
    public function all(array $relations = [],FilterDTO $filterDto): array;
    public function findById($id);
    public function create(PetDto $data);
    public function update($id, PetDto $data) ;
    public function delete($id): bool;

}
