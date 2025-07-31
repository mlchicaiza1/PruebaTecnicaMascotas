<?php

namespace App\Http\Controllers;

use App\Dtos\FilterDTO;
use App\Dtos\PetDto;
use App\Http\Requests\PetRequest;
use App\Http\Resources\PetCollection;
use App\Http\Resources\PetResource;
use App\Services\PetService;
use Illuminate\Http\Request;

class PetController extends Controller
{
    protected $petService;
    public function __construct(PetService $petService) {
        $this->petService = $petService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pets = $this->petService->getAllPets([],
            FilterDTO::from([
                'page'=>$request->get('page'),
                'perPage'=>$request->get('per_page'),
            ]));
        return response()->json(new PetCollection($pets));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PetRequest $request)
    {
        $pet = $this->petService->createPet(PetDto::from($request->validated()));
        return response()->json(new PetResource($pet->toArray()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $pet = $this->petService->findPetById($id);
         return response()->json(new PetResource($pet->toArray()));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pet = $this->petService->updatePet($id,PetDto::from($request));

        return  response()->json(new PetResource($pet->toArray()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $pet = $this->petService->deletePet($id);
         return response()->json(new PetResource($pet));
    }
}
