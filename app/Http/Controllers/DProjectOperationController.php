<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectOperationRequests\DProjectOperationStoreRequest;
use App\Http\Requests\DProjectOperationRequests\DProjectOperationUpdateRequest;
use App\Http\Resources\DProjectOperationResources\DProjectOperationCollection;
use App\Http\Resources\DProjectOperationResources\DProjectOperationResource;
use App\Models\DProjectOperation;
use App\Services\DProjectOperationServices\DProjectOperationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectOperationController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'operation non trouvé.';

    public function __construct(private DProjectOperationService $dProjectOperationService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectOperations = $this->dProjectOperationService->getAll($request->all());

        return response()->json(
            new DProjectOperationCollection($dProjectOperations)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectOperationStoreRequest $request): JsonResponse
    {
        $dProjectOperation = $this->dProjectOperationService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'operation a été créer avec succès.',
                'data' => new DProjectOperationResource($dProjectOperation),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectOperation $dProjectOperation): JsonResponse
    {

        return response()->json(new DProjectOperationResource($dProjectOperation));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectOperationUpdateRequest $request, DProjectOperation $dProjectOperation): JsonResponse
    {

        $this->dProjectOperationService->edit($request->validated(), $dProjectOperation);

        return response()->json([
            'message' => 'Le operation est modifié avec succée.',
            'data' => new DProjectOperationResource($dProjectOperation),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectOperation $dProjectOperation, Request $request): JsonResponse
    {

        $this->dProjectOperationService->delete($dProjectOperation);

        return response()->json(['message' => 'operation est supprimé avec succée.'], 202);
    }
}
