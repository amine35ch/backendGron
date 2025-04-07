<?php

namespace App\Http\Controllers;

use App\Http\Requests\DThirdPartyOperationRequests\DThirdPartyOperationStoreRequest;
use App\Http\Requests\DThirdPartyOperationRequests\DThirdPartyOperationUpdateRequest;
use App\Http\Resources\DThirdPartyOperationResources\DThirdPartyOperationCollection;
use App\Http\Resources\DThirdPartyOperationResources\DThirdPartyOperationResource;
use App\Models\DThirdPartyOperation;
use App\Services\DThirdPartyOperationServices\DThirdPartyOperationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DThirdPartyOperationController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'operation non trouvé.';

    public function __construct(private DThirdPartyOperationService $dThirdPartyOperationService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dThirdPartyOperations = $this->dThirdPartyOperationService->getAll($request->all());

        return response()->json(
            new DThirdPartyOperationCollection($dThirdPartyOperations)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DThirdPartyOperationStoreRequest $request): JsonResponse
    {
        $dThirdPartyOperation = $this->dThirdPartyOperationService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'operation a été créer avec succès.',
                'data' => new DThirdPartyOperationResource($dThirdPartyOperation),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DThirdPartyOperation $dThirdPartyOperation): JsonResponse
    {

        return response()->json(new DThirdPartyOperationResource($dThirdPartyOperation));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DThirdPartyOperationUpdateRequest $request, DThirdPartyOperation $dThirdPartyOperation): JsonResponse
    {

        $this->dThirdPartyOperationService->edit($request->validated(), $dThirdPartyOperation);

        return response()->json([
            'message' => 'Le operation est modifié avec succée.',
            'data' => new DThirdPartyOperationResource($dThirdPartyOperation),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DThirdPartyOperation $dThirdPartyOperation, Request $request): JsonResponse
    {

        $this->dThirdPartyOperationService->delete($dThirdPartyOperation);

        return response()->json(['message' => 'operation est supprimé avec succée.'], 202);
    }
}
