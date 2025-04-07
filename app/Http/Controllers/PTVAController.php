<?php

namespace App\Http\Controllers;

use App\Models\PTVA;
use App\Http\Requests\PTVARequests\PTVAStoreRequest;
use App\Http\Requests\PTVARequests\PTVAUpdateRequest;
use App\Http\Resources\PTVAResources\PTVAResource;
use App\Http\Resources\PTVAResources\PTVACollection;
use App\Services\PTVAServices\PTVAService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PTVAController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'TVA non trouvé.';

    public function __construct(private PTVAService $pTVAService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('viewAny', PTVA::class);
        $pTVAs = $this->pTVAService->getAll($request->all());

        return response()->json(
            new PTVACollection($pTVAs)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(PTVAStoreRequest $request): JsonResponse
    {
        $pTVA = $this->pTVAService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.TVA.create'),
                'data' => new PTVAResource($pTVA)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(PTVA $pTVA): JsonResponse
    {
        $this->authorize('view', $pTVA);
        return response()->json(new PTVAResource($pTVA));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(PTVAUpdateRequest $request, PTVA $pTVA): JsonResponse
    {

        $this->pTVAService->edit($request->validated(), $pTVA);
        return response()->json([
            'message' => __('responses.TVA.update'),
            'data' => new PTVAResource($pTVA)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(PTVA $pTVA, Request $request): JsonResponse
    {
        $this->authorize('delete', $pTVA);
        $this->pTVAService->delete($pTVA);

        return response()->json(['message' => __('responses.TVA.update'), 202]);
    }
}
