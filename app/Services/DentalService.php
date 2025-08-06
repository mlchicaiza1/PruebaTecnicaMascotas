<?php

namespace App\Services;

use App\Contracts\IDentalRepository;
use App\Dtos\DentalDto;
use App\Dtos\FilterDTO;

class DentalService
{
    protected $dentalRepository;


    public function __construct(IDentalRepository $dentalRepository)
    {
        $this->dentalRepository = $dentalRepository;
    }

    public function getAllDentals(array $relations = [],FilterDTO $filterDto): array
    {
        return $this->dentalRepository->all( $relations,$filterDto);
    }

    public function findDentalById($id): ?DentalDto
    {
        return $this->dentalRepository->findById($id);
    }

    public function createDental(DentalDto $data): ?DentalDto
    {
        return $this->dentalRepository->create($data);
    }

    public function updateDental($id, DentalDto $data): ?DentalDto
    {
        return $this->dentalRepository->update($id, $data);
    }

    public function deleteDental($id):bool
    {
        return $this->dentalRepository->delete($id);
    }
}
