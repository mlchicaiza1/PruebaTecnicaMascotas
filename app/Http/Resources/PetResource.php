<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource['id'] ,
            'name' => $this->resource['name'] ,
            'species' =>$this->resource['species'] ,
            'breed' => $this->resource['breed'] ,
            'age' => $this->resource['age'] ,
            'imageUrl' => $this->resource['imageUrl'] ,
            'temperament' => $this->resource['temperament'] ,
            'origin' => $this->resource['origin'],
            'personId' => $this->resource['personId'],
            /*'person' => [
                'id' => $this->resource['id'] ,
                'name' => $this->resource['name'] ,
                'email' => $this->resource['email'] ,
                'phone' => $this->resource['phone'],
            ],*/
        ];
    }
}
