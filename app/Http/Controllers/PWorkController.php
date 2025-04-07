<?php

namespace App\Http\Controllers;

use App\Http\Requests\PWorkRequests\PWorkStoreRequest;
use App\Http\Requests\PWorkRequests\PWorkUpdateRequest;
use App\Http\Resources\PWorkResources\PWorkCollection;
use App\Http\Resources\PWorkResources\PWorkResource;
use App\Models\PWork;
use App\Services\PWorkServices\PWorkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PWorkController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'work non trouvé.';

    public function __construct(private PWorkService $pWorkService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pWorks = $this->pWorkService->getAll($request->all());

        return response()->json(
            new PWorkCollection($pWorks)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PWorkStoreRequest $request): JsonResponse
    {
        $pWork = $this->pWorkService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'work a été créer avec succès.',
                'data' => new PWorkResource($pWork),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PWork $pWork): JsonResponse
    {

        return response()->json(new PWorkResource($pWork));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PWorkUpdateRequest $request, PWork $pWork): JsonResponse
    {

        $this->pWorkService->edit($request->validated(), $pWork);

        return response()->json([
            'message' => 'Le work est modifié avec succée.',
            'data' => new PWorkResource($pWork),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PWork $pWork, Request $request): JsonResponse
    {

        $this->pWorkService->delete($pWork);

        return response()->json(['message' => 'work est supprimé avec succée.'], 202);
    }
}
