<?php

namespace App\Http\Controllers;

use App\Http\Requests\PProjectEnergyClassRequests\PProjectEnergyClassStoreRequest;
use App\Http\Requests\PProjectEnergyClassRequests\PProjectEnergyClassUpdateRequest;
use App\Http\Resources\PProjectEnergyClassResources\PProjectEnergyClassCollection;
use App\Http\Resources\PProjectEnergyClassResources\PProjectEnergyClassResource;
use App\Models\PProjectEnergyClass;
use App\Services\PProjectEnergyClassServices\PProjectEnergyClassService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PProjectEnergyClassController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'energy-class non trouvé.';

    public function __construct(private PProjectEnergyClassService $pProjectEnergyClassService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pProjectEnergyClasss = $this->pProjectEnergyClassService->getAll($request->all());

        return response()->json(
            new PProjectEnergyClassCollection($pProjectEnergyClasss)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PProjectEnergyClassStoreRequest $request): JsonResponse
    {
        $pProjectEnergyClass = $this->pProjectEnergyClassService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'energy-class a été créer avec succès.',
                'data' => new PProjectEnergyClassResource($pProjectEnergyClass),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PProjectEnergyClass $pProjectEnergyClass): JsonResponse
    {

        return response()->json(new PProjectEnergyClassResource($pProjectEnergyClass));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PProjectEnergyClassUpdateRequest $request, PProjectEnergyClass $pProjectEnergyClass): JsonResponse
    {

        $this->pProjectEnergyClassService->edit($request->validated(), $pProjectEnergyClass);

        return response()->json([
            'message' => 'Le energy-class est modifié avec succée.',
            'data' => new PProjectEnergyClassResource($pProjectEnergyClass),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PProjectEnergyClass $pProjectEnergyClass, Request $request): JsonResponse
    {

        $this->pProjectEnergyClassService->delete($pProjectEnergyClass);

        return response()->json(['message' => 'energy-class est supprimé avec succée.'], 202);
    }
}
