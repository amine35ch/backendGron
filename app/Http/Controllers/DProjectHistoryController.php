<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectHistoryRequests\DProjectHistoryStoreRequest;
use App\Http\Requests\DProjectHistoryRequests\DProjectHistoryUpdateRequest;
use App\Http\Resources\DProjectHistoryResources\DProjectHistoryCollection;
use App\Http\Resources\DProjectHistoryResources\DProjectHistoryResource;
use App\Models\DProjectHistory;
use App\Services\DProjectHistoryServices\DProjectHistoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectHistoryController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-history non trouvé.';

    public function __construct(private DProjectHistoryService $dProjectHistoryService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectHistorys = $this->dProjectHistoryService->getAll($request->all());

        return response()->json(
            new DProjectHistoryCollection($dProjectHistorys)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectHistoryStoreRequest $request): JsonResponse
    {
        $dProjectHistory = $this->dProjectHistoryService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'project-history a été créer avec succès.',
                'data' => new DProjectHistoryResource($dProjectHistory),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectHistory $dProjectHistory): JsonResponse
    {

        return response()->json(new DProjectHistoryResource($dProjectHistory));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectHistoryUpdateRequest $request, DProjectHistory $dProjectHistory): JsonResponse
    {

        $this->dProjectHistoryService->edit($request->validated(), $dProjectHistory);

        return response()->json([
            'message' => 'Le project-history est modifié avec succée.',
            'data' => new DProjectHistoryResource($dProjectHistory),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectHistory $dProjectHistory, Request $request): JsonResponse
    {

        $this->dProjectHistoryService->delete($dProjectHistory);

        return response()->json(['message' => 'project-history est supprimé avec succée.'], 202);
    }
}
