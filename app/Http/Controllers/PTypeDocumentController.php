<?php

namespace App\Http\Controllers;

use App\Http\Requests\PTypeDocumentRequests\PTypeDocumentStoreRequest;
use App\Http\Requests\PTypeDocumentRequests\PTypeDocumentUpdateRequest;
use App\Http\Resources\PTypeDocumentResources\PTypeDocumentCollection;
use App\Http\Resources\PTypeDocumentResources\PTypeDocumentResource;
use App\Models\PTypeDocument;
use App\Services\PTypeDocumentServices\PTypeDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PTypeDocumentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Type Document non trouvé.';

    public function __construct(private PTypeDocumentService $pTypeDocumentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pTypeDocuments = $this->pTypeDocumentService->getAll($request->all());

        return response()->json(
            new PTypeDocumentCollection($pTypeDocuments)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PTypeDocumentStoreRequest $request): JsonResponse
    {
        $pTypeDocument = $this->pTypeDocumentService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'Type Document a été créer avec succès.',
                'data' => new PTypeDocumentResource($pTypeDocument),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PTypeDocument $pTypeDocument): JsonResponse
    {
        return response()->json(new PTypeDocumentResource($pTypeDocument));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PTypeDocumentUpdateRequest $request, PTypeDocument $pTypeDocument): JsonResponse
    {
        $this->pTypeDocumentService->edit($request->validated(), $pTypeDocument);

        return response()->json([
            'message' => 'Le Type Document est modifié avec succée.',
            'data' => new PTypeDocumentResource($pTypeDocument),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PTypeDocument $pTypeDocument, Request $request): JsonResponse
    {

        $this->pTypeDocumentService->delete($pTypeDocument);

        return response()->json(['message' => 'Type Document est supprimé avec succée.'], 202);
    }
}
