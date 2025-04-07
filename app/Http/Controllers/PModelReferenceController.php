<?php

namespace App\Http\Controllers;

use App\Http\Requests\PModelReferenceRequests\PModelReferenceStoreRequest;
use App\Http\Requests\PModelReferenceRequests\PModelReferenceUpdateRequest;
use App\Http\Resources\PModelReferenceResources\PModelReferenceCollection;
use App\Http\Resources\PModelReferenceResources\PModelReferenceResource;
use App\Models\PModelReference;
use App\Services\PModelReferenceServices\PModelReferenceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PModelReferenceController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Reference non trouvé.';

    public function __construct(private PModelReferenceService $pModelReferenceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pModelReferences = $this->pModelReferenceService->getAll($request->all());

        return response()->json(
            new PModelReferenceCollection($pModelReferences)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PModelReferenceStoreRequest $request): JsonResponse
    {
        $pModelReference = $this->pModelReferenceService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'Reference a été créer avec succès.',
                'data' => new PModelReferenceResource($pModelReference),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PModelReference $pModelReference): JsonResponse
    {

        return response()->json(new PModelReferenceResource($pModelReference));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PModelReferenceUpdateRequest $request, PModelReference $pModelReference): JsonResponse
    {

        $this->pModelReferenceService->edit($request->validated(), $pModelReference);

        return response()->json([
            'message' => 'Le Reference est modifié avec succée.',
            'data' => new PModelReferenceResource($pModelReference),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PModelReference $pModelReference, Request $request): JsonResponse
    {

        $this->pModelReferenceService->delete($pModelReference);

        return response()->json(['message' => 'Reference est supprimé avec succée.'], 202);
    }
}
