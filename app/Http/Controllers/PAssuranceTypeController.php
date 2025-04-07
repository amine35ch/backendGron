<?php

namespace App\Http\Controllers;

use App\Http\Requests\PAssuranceTypeRequests\PAssuranceTypeStoreRequest;
use App\Http\Requests\PAssuranceTypeRequests\PAssuranceTypeUpdateRequest;
use App\Http\Resources\PAssuranceTypeResources\PAssuranceTypeCollection;
use App\Http\Resources\PAssuranceTypeResources\PAssuranceTypeResource;
use App\Models\PAssuranceType;
use App\Services\PAssuranceTypeServices\PAssuranceTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PAssuranceTypeController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'assurance-type non trouvé.';

    public function __construct(private PAssuranceTypeService $pAssuranceTypeService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pAssuranceTypes = $this->pAssuranceTypeService->getAll($request->all());

        return response()->json(
            new PAssuranceTypeCollection($pAssuranceTypes)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PAssuranceTypeStoreRequest $request): JsonResponse
    {
        $pAssuranceType = $this->pAssuranceTypeService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.assurance-type.create'),
                'data' => new PAssuranceTypeResource($pAssuranceType),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PAssuranceType $pAssuranceType): JsonResponse
    {

        return response()->json(new PAssuranceTypeResource($pAssuranceType));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PAssuranceTypeUpdateRequest $request, PAssuranceType $pAssuranceType): JsonResponse
    {

        $this->pAssuranceTypeService->edit($request->validated(), $pAssuranceType);

        return response()->json([
            'message' => __('responses.assurance-type.update'),
            'data' => new PAssuranceTypeResource($pAssuranceType),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PAssuranceType $pAssuranceType, Request $request): JsonResponse
    {

        $this->pAssuranceTypeService->delete($pAssuranceType);

        return response()->json(['message' => __('responses.assurance-type.update'), 202]);
    }
}
