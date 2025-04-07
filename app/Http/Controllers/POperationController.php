<?php

namespace App\Http\Controllers;

use App\Http\Requests\POperationRequests\POperationStoreRequest;
use App\Http\Requests\POperationRequests\POperationUpdateRequest;
use App\Http\Resources\POperationResources\POperationCollection;
use App\Http\Resources\POperationResources\POperationResource;
use App\Models\POperation;
use App\Services\POperationServices\POperationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class POperationController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'operation non trouvé.';

    public function __construct(private POperationService $pOperationService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pOperations = $this->pOperationService->getAll($request->all());

        return response()->json(
            new POperationCollection($pOperations)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(POperationStoreRequest $request): JsonResponse
    {
        $pOperation = $this->pOperationService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'operation a été créer avec succès.',
                'data' => new POperationResource($pOperation),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(POperation $pOperation): JsonResponse
    {

        return response()->json(new POperationResource($pOperation));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(POperationUpdateRequest $request, POperation $pOperation): JsonResponse
    {

        $this->pOperationService->edit($request->validated(), $pOperation);

        return response()->json([
            'message' => 'Le operation est modifié avec succée.',
            'data' => new POperationResource($pOperation),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(POperation $pOperation, Request $request): JsonResponse
    {

        $this->pOperationService->delete($pOperation);

        return response()->json(['message' => 'operation est supprimé avec succée.'], 202);
    }

    public function getThirdParties(POperation $pOperation)
    {
        return response()->json(
            $this->pOperationService->getOperationsByThirdParty($pOperation),
            202
        );
    }

    public function disableOperation(POperation $pOperation)
    {
        $this->pOperationService->disableOperation($pOperation);

        return response()->json([
            'message' => __('responses.operation.disabled'),
        ], 202);
    }
}
