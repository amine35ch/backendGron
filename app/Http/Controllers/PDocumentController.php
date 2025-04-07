<?php

namespace App\Http\Controllers;

use App\Http\Requests\PDocumentRequests\PDocumentStoreRequest;
use App\Http\Requests\PDocumentRequests\PDocumentUpdateRequest;
use App\Http\Resources\PDocumentResources\PDocumentCollection;
use App\Http\Resources\PDocumentResources\PDocumentResource;
use App\Models\PDocument;
use App\Services\PDocumentServices\PDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PDocumentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Document non trouvé.';

    public function __construct(private PDocumentService $pDocumentService) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pDocuments = $this->pDocumentService->getAll($request->all(), true);

        return response()->json(
            new PDocumentCollection($pDocuments)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PDocumentStoreRequest $request): JsonResponse
    {
        $pDocument = $this->pDocumentService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'Document a été créer avec succès.',
                'data' => new PDocumentResource($pDocument),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PDocument $pDocument): JsonResponse
    {

        return response()->json(new PDocumentResource($pDocument));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PDocumentUpdateRequest $request, PDocument $pDocument): JsonResponse
    {

        $this->pDocumentService->edit($request->validated(), $pDocument);

        return response()->json([
            'message' => 'Le Document est modifié avec succée.',
            'data' => new PDocumentResource($pDocument),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PDocument $pDocument, Request $request): JsonResponse
    {

        $this->pDocumentService->delete($pDocument);

        return response()->json(['message' => 'Document est supprimé avec succée.'], 202);
    }
}
