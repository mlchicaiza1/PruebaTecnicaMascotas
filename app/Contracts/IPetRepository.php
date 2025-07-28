<?php

namespace App\Contracts;

use App\Dtos\PetDto;

interface IPetRepository
{
    public function all(): array;
    public function findById($id);
    public function create(PetDto $data);
    public function update($id, PetDto $data) ;
    public function delete($id): bool;

}
