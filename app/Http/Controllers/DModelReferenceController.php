<?php

namespace App\Http\Controllers;

use App\Http\Requests\DModelReferenceRequests\DModelReferenceStoreRequest;
use App\Http\Requests\DModelReferenceRequests\DModelReferenceUpdateRequest;
use App\Http\Resources\DModelReferenceResources\DModelReferenceCollection;
use App\Http\Resources\DModelReferenceResources\DModelReferenceResource;
use App\Models\DModelReference;
use App\Services\DModelReferenceServices\DModelReferenceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DModelReferenceController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'model-reference non trouvé.';

    public function __construct(private DModelReferenceService $dModelReferenceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dModelReferences = $this->dModelReferenceService->getAll($request->all());

        return response()->json(
            new DModelReferenceCollection($dModelReferences)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DModelReferenceStoreRequest $request): JsonResponse
    {
        $dModelReference = $this->dModelReferenceService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.model-reference.create'),
                'data' => new DModelReferenceResource($dModelReference),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DModelReference $dModelReference): JsonResponse
    {
        return response()->json(new DModelReferenceResource($dModelReference));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DModelReferenceUpdateRequest $request, DModelReference $dModelReference): JsonResponse
    {

        $this->dModelReferenceService->edit($request->validated(), $dModelReference);

        return response()->json([
            'message' => __('responses.model-reference.update'),
            'data' => new DModelReferenceResource($dModelReference),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DModelReference $dModelReference, Request $request): JsonResponse
    {

        $this->dModelReferenceService->delete($dModelReference);

        return response()->json(['message' => __('responses.model-reference.update'), 202]);
    }
}
