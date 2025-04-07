<?php

namespace App\Http\Controllers;

use App\Http\Requests\PStepRequests\PStepStoreRequest;
use App\Http\Requests\PStepRequests\PStepUpdateRequest;
use App\Http\Resources\PStepResources\PStepCollection;
use App\Http\Resources\PStepResources\PStepResource;
use App\Models\PStep;
use App\Services\PStepServices\PStepService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PStepController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Step non trouvé.';

    public function __construct(private PStepService $pStepService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pSteps = $this->pStepService->getAll($request->all());

        return response()->json(
            new PStepCollection($pSteps)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PStepStoreRequest $request): JsonResponse
    {
        $pStep = $this->pStepService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'Step a été créer avec succès.',
                'data' => new PStepResource($pStep),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PStep $pStep): JsonResponse
    {

        return response()->json(new PStepResource($pStep));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PStepUpdateRequest $request, PStep $pStep): JsonResponse
    {

        $this->pStepService->edit($request->validated(), $pStep);

        return response()->json([
            'message' => 'Le Step est modifié avec succée.',
            'data' => new PStepResource($pStep),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PStep $pStep, Request $request): JsonResponse
    {

        $this->pStepService->delete($pStep);

        return response()->json(['message' => 'Step est supprimé avec succée.'], 202);
    }
}
