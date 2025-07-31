<?php

namespace App\Services;

use App\Contracts\IPetRepository;
use App\Dtos\PetDto;
use App\Dtos\FilterDTO;

class PetService
{
    protected $petRepository;
    protected $dogApiService;

    public function __construct(IPetRepository $petRepository, DogApiService $dogApiService)
    {
        $this->petRepository = $petRepository;
        $this->dogApiService = $dogApiService;
    }

    public function getAllPets(array $relations = [],FilterDTO $filterDto): array
    {
        return $this->petRepository->all( $relations,$filterDto);
    }

    public function findPetById($id): ?PetDto
    {
        return $this->petRepository->findById($id);
    }

    public function createPet(PetDto $data): ?PetDto
    {
        $breedData = $this->dogApiService->searchBreedWithImage($data->breed ?? '');
        if ($breedData && isset($breedData['imageUrl'])) {
            $data->imageUrl = $breedData['imageUrl'];
            $data->temperament = $breedData['temperament'];
             $data->origin = $breedData['origin'];
        }

        return $this->petRepository->create($data);
    }

    public function updatePet($id, PetDto $data): ?PetDto
    {
        return $this->petRepository->update($id, $data);
    }

    public function deletePet($id):bool
    {
        return $this->petRepository->delete($id);
    }
}
