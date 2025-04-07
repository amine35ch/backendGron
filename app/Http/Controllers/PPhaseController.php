<?php

namespace App\Http\Controllers;

use App\Http\Requests\PPhaseRequests\PPhaseStoreRequest;
use App\Http\Requests\PPhaseRequests\PPhaseUpdateRequest;
use App\Http\Resources\PPhaseResources\PPhaseCollection;
use App\Http\Resources\PPhaseResources\PPhaseResource;
use App\Models\PPhase;
use App\Services\PPhaseServices\PPhaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PPhaseController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'phase non trouvé.';

    public function __construct(private PPhaseService $pPhaseService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pPhases = $this->pPhaseService->getAll($request->all());

        return response()->json(
            new PPhaseCollection($pPhases)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PPhaseStoreRequest $request): JsonResponse
    {
        $pPhase = $this->pPhaseService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.phase.create'),
                'data' => new PPhaseResource($pPhase),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PPhase $pPhase): JsonResponse
    {

        return response()->json(new PPhaseResource($pPhase));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PPhaseUpdateRequest $request, PPhase $pPhase): JsonResponse
    {

        $this->pPhaseService->edit($request->validated(), $pPhase);

        return response()->json([
            'message' => __('responses.phase.update'),
            'data' => new PPhaseResource($pPhase),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PPhase $pPhase, Request $request): JsonResponse
    {

        $this->pPhaseService->delete($pPhase);

        return response()->json(['message' => __('responses.phase.update'), 202]);
    }
}
