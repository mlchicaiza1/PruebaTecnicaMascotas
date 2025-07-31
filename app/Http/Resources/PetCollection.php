<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PetCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
           'data' => PetResource::collection($this->collection['data']->resource),
            'pagination' => [
                'current_page' => $this->collection['current_page']->resource,
                'last_page' => $this->collection['last_page']->resource,
                'per_page' => $this->collection['per_page']->resource,
                'total' => $this->collection['total']->resource,
            ],
        ];
    }
}
