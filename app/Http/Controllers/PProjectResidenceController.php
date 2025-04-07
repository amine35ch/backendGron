<?php

namespace App\Http\Controllers;

use App\Http\Requests\PProjectResidenceRequests\PProjectResidenceStoreRequest;
use App\Http\Requests\PProjectResidenceRequests\PProjectResidenceUpdateRequest;
use App\Http\Resources\PProjectResidenceResources\PProjectResidenceCollection;
use App\Http\Resources\PProjectResidenceResources\PProjectResidenceResource;
use App\Models\PProjectResidence;
use App\Services\PProjectResidenceServices\PProjectResidenceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PProjectResidenceController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-residences non trouvé.';

    public function __construct(private PProjectResidenceService $pProjectResidenceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pProjectResidences = $this->pProjectResidenceService->getAll($request->all());

        return response()->json(
            new PProjectResidenceCollection($pProjectResidences)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PProjectResidenceStoreRequest $request): JsonResponse
    {
        $pProjectResidence = $this->pProjectResidenceService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'project-residences a été créer avec succès.',
                'data' => new PProjectResidenceResource($pProjectResidence),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PProjectResidence $pProjectResidence): JsonResponse
    {

        return response()->json(new PProjectResidenceResource($pProjectResidence));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PProjectResidenceUpdateRequest $request, PProjectResidence $pProjectResidence): JsonResponse
    {

        $this->pProjectResidenceService->edit($request->validated(), $pProjectResidence);

        return response()->json([
            'message' => 'Le project-residences est modifié avec succée.',
            'data' => new PProjectResidenceResource($pProjectResidence),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PProjectResidence $pProjectResidence, Request $request): JsonResponse
    {

        $this->pProjectResidenceService->delete($pProjectResidence);

        return response()->json(['message' => 'project-residences est supprimé avec succée.'], 202);
    }
}
