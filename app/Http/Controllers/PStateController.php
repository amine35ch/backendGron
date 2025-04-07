<?php

namespace App\Http\Controllers;

use App\Http\Requests\PStateRequests\PStateStoreRequest;
use App\Http\Requests\PStateRequests\PStateUpdateRequest;
use App\Http\Resources\PStateResources\PStateCollection;
use App\Http\Resources\PStateResources\PStateResource;
use App\Models\PState;
use App\Services\PStateServices\PStateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PStateController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'state non trouvé.';

    public function __construct(private PStateService $pStateService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pStates = $this->pStateService->getAll($request->all());

        return response()->json(
            new PStateCollection($pStates)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PStateStoreRequest $request): JsonResponse
    {
        $pState = $this->pStateService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'state a été créer avec succès.',
                'data' => new PStateResource($pState),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PState $pState): JsonResponse
    {

        return response()->json(new PStateResource($pState));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PStateUpdateRequest $request, PState $pState): JsonResponse
    {

        $this->pStateService->edit($request->validated(), $pState);

        return response()->json([
            'message' => 'Le state est modifié avec succée.',
            'data' => new PStateResource($pState),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PState $pState, Request $request): JsonResponse
    {

        $this->pStateService->delete($pState);

        return response()->json(['message' => 'state est supprimé avec succée.'], 202);
    }
}
