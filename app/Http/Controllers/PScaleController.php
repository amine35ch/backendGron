<?php

namespace App\Http\Controllers;

use App\Models\PScale;
use App\Http\Requests\PScaleRequests\PScaleStoreRequest;
use App\Http\Requests\PScaleRequests\PScaleUpdateRequest;
use App\Http\Resources\PScaleResources\PScaleResource;
use App\Http\Resources\PScaleResources\PScaleCollection;
use App\Services\PScaleServices\PScaleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PScaleController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Scale non trouvé.';

    public function __construct(private PScaleService $pScaleService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('viewAny', PScale::class);
        $pScales = $this->pScaleService->getAll($request->all());

        return response()->json(
            new PScaleCollection($pScales)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(PScaleStoreRequest $request): JsonResponse
    {
        $pScale = $this->pScaleService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.Scale.create'),
                'data' => new PScaleResource($pScale)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(PScale $pScale): JsonResponse
    {
        $this->authorize('view', $pScale);
        return response()->json(new PScaleResource($pScale));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(PScaleUpdateRequest $request, PScale $pScale): JsonResponse
    {

        $this->pScaleService->edit($request->validated(), $pScale);
        return response()->json([
            'message' => __('responses.Scale.update'),
            'data' => new PScaleResource($pScale)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(PScale $pScale, Request $request): JsonResponse
    {
        $this->authorize('delete', $pScale);
        $this->pScaleService->delete($pScale);

        return response()->json(['message' => __('responses.Scale.update'), 202]);
    }
}
