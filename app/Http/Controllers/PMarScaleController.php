<?php

namespace App\Http\Controllers;

use App\Http\Requests\PMarScaleRequests\PMarScaleStoreRequest;
use App\Http\Requests\PMarScaleRequests\PMarScaleUpdateRequest;
use App\Http\Resources\PMarScaleResources\PMarScaleCollection;
use App\Http\Resources\PMarScaleResources\PMarScaleResource;
use App\Models\PMarScale;
use App\Services\PMarScaleServices\PMarScaleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PMarScaleController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'mar-scale non trouvé.';

    public function __construct(private PMarScaleService $pMarScaleService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pMarScales = $this->pMarScaleService->getAll($request->all());

        return response()->json(
            new PMarScaleCollection($pMarScales)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PMarScaleStoreRequest $request): JsonResponse
    {
        $pMarScale = $this->pMarScaleService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.mar-scale.create'),
                'data' => new PMarScaleResource($pMarScale),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PMarScale $pMarScale): JsonResponse
    {

        return response()->json(new PMarScaleResource($pMarScale));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PMarScaleUpdateRequest $request, PMarScale $pMarScale): JsonResponse
    {

        $this->pMarScaleService->edit($request->validated(), $pMarScale);

        return response()->json([
            'message' => __('responses.mar-scale.update'),
            'data' => new PMarScaleResource($pMarScale),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PMarScale $pMarScale, Request $request): JsonResponse
    {

        $this->pMarScaleService->delete($pMarScale);

        return response()->json(['message' => __('responses.mar-scale.update'), 202]);
    }
}
