<?php

namespace App\Http\Controllers;

use App\Dtos\FilterDTO;
use App\Dtos\DentalDto;
use App\Http\Requests\StoreDentalRequest;
use App\Services\DentalService;
use Illuminate\Http\Request;

class DentalController extends Controller
{
    protected $dentalService;
    public function __construct(DentalService $dentalService) {
        $this->dentalService = $dentalService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dentals = $this->dentalService->getAllDentals([],
            FilterDTO::from([
                'page'=>$request->get('page'),
                'perPage'=>$request->get('per_page'),
            ]));
        return response()->json( $dentals);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDentalRequest $request)
    {
        $dental = $this->dentalService->createDental(DentalDto::from($request->validated()));
        return response()->json($dental, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $dental = $this->dentalService->findDentalById($id);
         return response()->json($dental);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dental = $this->dentalService->updateDental($id,DentalDto::from($request));

        return  response()->json($dental);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $dental = $this->dentalService->deleteDental($id);
         return response()->json($dental);
    }
}
