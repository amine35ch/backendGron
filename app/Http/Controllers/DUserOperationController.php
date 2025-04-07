<?php

namespace App\Http\Controllers;

use App\Http\Requests\DUserOperationRequests\DUserOperationStoreRequest;
use App\Http\Requests\DUserOperationRequests\DUserOperationUpdateRequest;
use App\Http\Resources\DUserOperationResources\DUserOperationCollection;
use App\Http\Resources\DUserOperationResources\DUserOperationResource;
use App\Models\DUserOperation;
use App\Services\DUserOperationServices\DUserOperationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DUserOperationController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'user-operations non trouvé.';

    public function __construct(private DUserOperationService $dUserOperationService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dUserOperations = $this->dUserOperationService->getAll($request->all());

        return response()->json(
            new DUserOperationCollection($dUserOperations)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DUserOperationStoreRequest $request): JsonResponse
    {
        $dUserOperation = $this->dUserOperationService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.user-operations.create'),
                'data' => new DUserOperationResource($dUserOperation),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DUserOperation $dUserOperation): JsonResponse
    {

        return response()->json(new DUserOperationResource($dUserOperation));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DUserOperationUpdateRequest $request, DUserOperation $dUserOperation): JsonResponse
    {

        $this->dUserOperationService->edit($request->validated(), $dUserOperation);

        return response()->json([
            'message' => __('responses.user-operations.update'),
            'data' => new DUserOperationResource($dUserOperation),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DUserOperation $dUserOperation, Request $request): JsonResponse
    {

        $this->dUserOperationService->delete($dUserOperation);

        return response()->json(['message' => __('responses.user-operations.update'), 202]);
    }
}
