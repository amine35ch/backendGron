<?php

namespace App\Http\Controllers;

use App\Http\Requests\PTypeCollaboratorRequests\PTypeCollaboratorStoreRequest;
use App\Http\Requests\PTypeCollaboratorRequests\PTypeCollaboratorUpdateRequest;
use App\Http\Resources\PTypeCollaboratorResources\PTypeCollaboratorCollection;
use App\Http\Resources\PTypeCollaboratorResources\PTypeCollaboratorResource;
use App\Models\PTypeCollaborator;
use App\Services\PTypeCollaboratorServices\PTypeCollaboratorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PTypeCollaboratorController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'type-collaborator non trouvé.';

    public function __construct(private PTypeCollaboratorService $pTypeCollaboratorService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pTypeCollaborators = $this->pTypeCollaboratorService->getAll($request->all());

        return response()->json(
            new PTypeCollaboratorCollection($pTypeCollaborators)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PTypeCollaboratorStoreRequest $request): JsonResponse
    {
        $pTypeCollaborator = $this->pTypeCollaboratorService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'type-collaborator a été créer avec succès.',
                'data' => new PTypeCollaboratorResource($pTypeCollaborator),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PTypeCollaborator $pTypeCollaborator): JsonResponse
    {

        return response()->json(new PTypeCollaboratorResource($pTypeCollaborator));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PTypeCollaboratorUpdateRequest $request, PTypeCollaborator $pTypeCollaborator): JsonResponse
    {

        $this->pTypeCollaboratorService->edit($request->validated(), $pTypeCollaborator);

        return response()->json([
            'message' => 'Le type-collaborator est modifié avec succée.',
            'data' => new PTypeCollaboratorResource($pTypeCollaborator),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PTypeCollaborator $pTypeCollaborator, Request $request): JsonResponse
    {

        $this->pTypeCollaboratorService->delete($pTypeCollaborator);

        return response()->json(['message' => 'type-collaborator est supprimé avec succée.'], 202);
    }
}
