<?php

namespace App\Http\Controllers;

use App\Http\Requests\DDocumentRequests\DDocumentStoreRequest;
use App\Http\Requests\DDocumentRequests\DDocumentUpdateRequest;
use App\Http\Resources\DDocumentResources\DDocumentCollection;
use App\Http\Resources\DDocumentResources\DDocumentResource;
use App\Models\DDocument;
use App\Services\DDocumentServices\DDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DDocumentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Document non trouvé.';

    public function __construct(private DDocumentService $dDocumentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dDocuments = $this->dDocumentService->getAll($request->all());

        return response()->json(
            new DDocumentCollection($dDocuments)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DDocumentStoreRequest $request): JsonResponse
    {
        $dDocument = $this->dDocumentService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'Document a été créer avec succès.',
                'data' => new DDocumentResource($dDocument),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DDocument $dDocument): JsonResponse
    {

        return response()->json(new DDocumentResource($dDocument));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DDocumentUpdateRequest $request, DDocument $dDocument): JsonResponse
    {

        $this->dDocumentService->edit($request->validated(), $dDocument);

        return response()->json([
            'message' => 'Le Document est modifié avec succée.',
            'data' => new DDocumentResource($dDocument),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DDocument $dDocument, Request $request): JsonResponse
    {

        $this->dDocumentService->delete($dDocument);

        return response()->json(['message' => 'Document est supprimé avec succée.'], 202);
    }
}
