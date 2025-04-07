<?php

namespace App\Http\Controllers;

use App\Http\Requests\PResourceRequests\PResourceStoreRequest;
use App\Http\Requests\PResourceRequests\PResourceUpdateRequest;
use App\Http\Resources\PResourceResources\PResourceCollection;
use App\Http\Resources\PResourceResources\PResourceResource;
use App\Models\PResource;
use App\Services\PResourceServices\PResourceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PResourceController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Resource non trouvé.';

    public function __construct(private PResourceService $pResourceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pResources = $this->pResourceService->getAll($request->all());

        return response()->json(
            new PResourceCollection($pResources)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PResourceStoreRequest $request): JsonResponse
    {
        $pResource = $this->pResourceService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'Resource a été créer avec succès.',
                'data' => new PResourceResource($pResource),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PResource $pResource): JsonResponse
    {

        return response()->json(new PResourceResource($pResource));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PResourceUpdateRequest $request, PResource $pResource): JsonResponse
    {

        $this->pResourceService->edit($request->validated(), $pResource);

        return response()->json([
            'message' => 'Le Resource est modifié avec succée.',
            'data' => new PResourceResource($pResource),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PResource $pResource, Request $request): JsonResponse
    {

        $this->pResourceService->delete($pResource);

        return response()->json(['message' => 'Resource est supprimé avec succée.'], 202);
    }
}
