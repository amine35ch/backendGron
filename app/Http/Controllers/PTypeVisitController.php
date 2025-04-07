<?php

namespace App\Http\Controllers;

use App\Http\Requests\PTypeVisitRequests\PTypeVisitStoreRequest;
use App\Http\Requests\PTypeVisitRequests\PTypeVisitUpdateRequest;
use App\Http\Resources\PTypeVisitResources\PTypeVisitCollection;
use App\Http\Resources\PTypeVisitResources\PTypeVisitResource;
use App\Models\PTypeVisit;
use App\Services\PTypeVisitServices\PTypeVisitService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PTypeVisitController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'type-visit non trouvé.';

    public function __construct(private PTypeVisitService $pTypeVisitService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pTypeVisits = $this->pTypeVisitService->getAll($request->all());

        return response()->json(
            new PTypeVisitCollection($pTypeVisits)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PTypeVisitStoreRequest $request): JsonResponse
    {
        $pTypeVisit = $this->pTypeVisitService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'type-visit a été créer avec succès.',
                'data' => new PTypeVisitResource($pTypeVisit),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PTypeVisit $pTypeVisit): JsonResponse
    {

        return response()->json(new PTypeVisitResource($pTypeVisit));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PTypeVisitUpdateRequest $request, PTypeVisit $pTypeVisit): JsonResponse
    {

        $this->pTypeVisitService->edit($request->validated(), $pTypeVisit);

        return response()->json([
            'message' => 'Le type-visit est modifié avec succée.',
            'data' => new PTypeVisitResource($pTypeVisit),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PTypeVisit $pTypeVisit, Request $request): JsonResponse
    {

        $this->pTypeVisitService->delete($pTypeVisit);

        return response()->json(['message' => 'type-visit est supprimé avec succée.'], 202);
    }
}
