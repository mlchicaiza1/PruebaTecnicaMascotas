<?php

namespace App\Http\Controllers;

use App\Dtos\FilterDTO;
use App\Dtos\PersonDto;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonCollection;
use App\Http\Resources\PersonResource;
use App\Services\PersonService;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    protected $personService;
    public function __construct(PersonService $personService) {
        $this->personService = $personService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $persons = $this->personService->getAllPersons([],
            FilterDTO::from([
                'page'=>$request->get('page'),
                'perPage'=>$request->get('per_page'),

            ])
        );
        return response()->json(new PersonCollection($persons));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        $person = $this->personService->createPerson(PersonDto::from($request->validated()));
        return response()->json(new PersonResource($person->toArray()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $person = $this->personService->findPersonById($id);
         return response()->json(new PersonResource($person->toArray()));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $person = $this->personService->updatePerson($id,PersonDto::from($request));

        return  response()->json(new PersonResource($person->toArray()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $person = $this->personService->deletePerson($id);
         return response()->json(new PersonResource($person));
    }

    public function personWithPet(string $id)
    {
         $person = $this->personService->findPersonById($id,['pets']);
         return response()->json(new PersonResource($person->toArray()));
    }
}
