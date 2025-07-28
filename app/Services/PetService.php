<?php

namespace App\Services;

use App\Contracts\IPetRepository;
use App\Dtos\PetDto;

class PetService
{
    protected $petRepository;
    protected $dogApiService;

    public function __construct(IPetRepository $petRepository, DogApiService $dogApiService)
    {
        $this->petRepository = $petRepository;
        $this->dogApiService = $dogApiService;
    }

    public function getAllPets(): array
    {
        return $this->petRepository->all();
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
