<?php

namespace App\Http\Controllers;

use App\Http\Requests\DLogRequests\DLogStoreRequest;
use App\Http\Requests\DLogRequests\DLogUpdateRequest;
use App\Http\Resources\DLogResources\DLogCollection;
use App\Http\Resources\DLogResources\DLogResource;
use App\Models\DLog;
use App\Services\DLogServices\DLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DLogController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'log non trouvé.';

    public function __construct(private DLogService $dLogService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dLogs = $this->dLogService->getAll($request->all());

        return response()->json(
            new DLogCollection($dLogs)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DLogStoreRequest $request): JsonResponse
    {
        $dLog = $this->dLogService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'log a été créer avec succès.',
                'data' => new DLogResource($dLog),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DLog $dLog): JsonResponse
    {

        return response()->json(new DLogResource($dLog));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DLogUpdateRequest $request, DLog $dLog): JsonResponse
    {

        $this->dLogService->edit($request->validated(), $dLog);

        return response()->json([
            'message' => 'Le log est modifié avec succée.',
            'data' => new DLogResource($dLog),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DLog $dLog, Request $request): JsonResponse
    {

        $this->dLogService->delete($dLog);

        return response()->json(['message' => 'log est supprimé avec succée.'], 202);
    }
}
