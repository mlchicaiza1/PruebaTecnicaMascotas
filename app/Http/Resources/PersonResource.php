<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource['id'],
            'name' => $this->resource['name'],
            'email' => $this->resource['email'],
            'address' => $this->resource['address'],
            'birthDate' => $this->resource['birthDate'],
            'phone' => $this->resource['phone'],
            'pets'  => isset($this->resource['pets'])
                ? collect($this->resource['pets'])->map(function ($pet) {
                    return [
                        'id'   => $pet['id'],
                        'name' => $pet['name'],
                        'breed' => $pet['breed'],
                        'age' => $pet['age'],
                        'temperament'=>$pet['temperament']
                    ];
                })
                : null,
        ];
    }
}
