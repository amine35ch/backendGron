<?php

namespace App\Http\Controllers;

use App\Http\Requests\PTypeDemandeProjectRequests\PTypeDemandeProjectStoreRequest;
use App\Http\Requests\PTypeDemandeProjectRequests\PTypeDemandeProjectUpdateRequest;
use App\Http\Resources\PTypeDemandeProjectResources\PTypeDemandeProjectCollection;
use App\Http\Resources\PTypeDemandeProjectResources\PTypeDemandeProjectResource;
use App\Models\PTypeDemandeProject;
use App\Services\PTypeDemandeProjectServices\PTypeDemandeProjectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PTypeDemandeProjectController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'type-demande non trouvé.';

    public function __construct(private PTypeDemandeProjectService $pTypeDemandeProjectService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pTypeDemandeProjects = $this->pTypeDemandeProjectService->getAll($request->all());

        return response()->json(
            new PTypeDemandeProjectCollection($pTypeDemandeProjects)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PTypeDemandeProjectStoreRequest $request): JsonResponse
    {
        $pTypeDemandeProject = $this->pTypeDemandeProjectService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'type-demande a été créer avec succès.',
                'data' => new PTypeDemandeProjectResource($pTypeDemandeProject),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PTypeDemandeProject $pTypeDemandeProject): JsonResponse
    {

        return response()->json(new PTypeDemandeProjectResource($pTypeDemandeProject));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PTypeDemandeProjectUpdateRequest $request, PTypeDemandeProject $pTypeDemandeProject): JsonResponse
    {

        $this->pTypeDemandeProjectService->edit($request->validated(), $pTypeDemandeProject);

        return response()->json([
            'message' => 'Le type-demande est modifié avec succée.',
            'data' => new PTypeDemandeProjectResource($pTypeDemandeProject),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PTypeDemandeProject $pTypeDemandeProject, Request $request): JsonResponse
    {

        $this->pTypeDemandeProjectService->delete($pTypeDemandeProject);

        return response()->json(['message' => 'type-demande est supprimé avec succée.'], 202);
    }
}
