<?php

namespace App\Http\Controllers;

use App\Http\Requests\PRaisonTypesRequests\PRaisonTypesStoreRequest;
use App\Http\Requests\PRaisonTypesRequests\PRaisonTypesUpdateRequest;
use App\Http\Resources\PRaisonTypesResources\PRaisonTypesCollection;
use App\Http\Resources\PRaisonTypesResources\PRaisonTypesResource;
use App\Models\PRaisonTypes;
use App\Services\PRaisonTypesServices\PRaisonTypesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PRaisonTypesController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'sub-contractor-raison-type non trouvé.';

    public function __construct(private PRaisonTypesService $PRaisonTypesService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $PRaisonTypess = $this->PRaisonTypesService->getAll($request->all());

        return response()->json(
            new PRaisonTypesCollection($PRaisonTypess)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PRaisonTypesStoreRequest $request): JsonResponse
    {
        $PRaisonTypes = $this->PRaisonTypesService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.sub-contractor-raison-type.create'),
                'data' => new PRaisonTypesResource($PRaisonTypes),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PRaisonTypes $PRaisonTypes): JsonResponse
    {

        return response()->json(new PRaisonTypesResource($PRaisonTypes));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PRaisonTypesUpdateRequest $request, PRaisonTypes $PRaisonTypes): JsonResponse
    {

        $this->PRaisonTypesService->edit($request->validated(), $PRaisonTypes);

        return response()->json([
            'message' => __('responses.sub-contractor-raison-type.update'),
            'data' => new PRaisonTypesResource($PRaisonTypes),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PRaisonTypes $PRaisonTypes, Request $request): JsonResponse
    {

        $this->PRaisonTypesService->delete($PRaisonTypes);

        return response()->json(['message' => __('responses.sub-contractor-raison-type.update'), 202]);
    }
}
