<?php

namespace App\Http\Controllers;

use App\Http\Requests\PProjectNatureRequests\PProjectNatureStoreRequest;
use App\Http\Requests\PProjectNatureRequests\PProjectNatureUpdateRequest;
use App\Http\Resources\PProjectNatureResources\PProjectNatureCollection;
use App\Http\Resources\PProjectNatureResources\PProjectNatureResource;
use App\Models\PProjectNature;
use App\Services\PProjectNatureServices\PProjectNatureService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PProjectNatureController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-nature non trouvé.';

    public function __construct(private PProjectNatureService $pProjectNatureService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pProjectNatures = $this->pProjectNatureService->getAll($request->all());

        return response()->json(
            new PProjectNatureCollection($pProjectNatures)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PProjectNatureStoreRequest $request): JsonResponse
    {
        $pProjectNature = $this->pProjectNatureService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'project-nature a été créer avec succès.',
                'data' => new PProjectNatureResource($pProjectNature),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PProjectNature $pProjectNature): JsonResponse
    {

        return response()->json(new PProjectNatureResource($pProjectNature));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PProjectNatureUpdateRequest $request, PProjectNature $pProjectNature): JsonResponse
    {

        $this->pProjectNatureService->edit($request->validated(), $pProjectNature);

        return response()->json([
            'message' => 'Le project-nature est modifié avec succée.',
            'data' => new PProjectNatureResource($pProjectNature),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PProjectNature $pProjectNature, Request $request): JsonResponse
    {

        $this->pProjectNatureService->delete($pProjectNature);

        return response()->json(['message' => 'project-nature est supprimé avec succée.'], 202);
    }
}
