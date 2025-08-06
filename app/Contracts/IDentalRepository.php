<?php

namespace App\Contracts;

use App\Dtos\DentalDto;
use App\Dtos\FilterDTO;

interface IDentalRepository
{
    public function all(array $relations = [],FilterDTO $filterDto): array;
    public function findById($id);
    public function create(DentalDto $data);
    public function update($id, DentalDto $data) ;
    public function delete($id): bool;

}
