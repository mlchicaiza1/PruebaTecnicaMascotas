<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DogApiService
{
    protected string $baseUrl = 'https://api.thedogapi.com/v1';

    public function searchBreed(string $name): ?array
    {
        $response = Http::get("{$this->baseUrl}/breeds/search", [
            'q' => $name
        ]);

        if ($response->successful() && count($response->json()) > 0) {
            return $response->json()[0];
        }

        return null;
    }

    public function getImageById(string $imageId): ?string
    {
        $response = Http::get("{$this->baseUrl}/images/{$imageId}");

        if ($response->successful()) {
            return $response->json()['url'] ?? null;
        }

        return null;
    }

    public function searchBreedWithImage(string $name): ?array
    {
        $breed = $this->searchBreed($name);

        if (!$breed) {
            return null;
        }

        $imageUrl = isset($breed['reference_image_id'])
            ? $this->getImageById($breed['reference_image_id'])
            : null;

        return [
            'name' => $breed['name'],
            'temperament' => $breed['temperament'] ?? null,
            'origin' => $breed['origin'] ?? null,
            'imageUrl' => $imageUrl
        ];
    }
}
