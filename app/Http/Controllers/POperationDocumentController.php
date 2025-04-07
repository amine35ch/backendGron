<?php

namespace App\Http\Controllers;

use App\Http\Requests\POperationDocumentRequests\POperationDocumentStoreRequest;
use App\Http\Requests\POperationDocumentRequests\POperationDocumentUpdateRequest;
use App\Http\Resources\POperationDocumentResources\POperationDocumentCollection;
use App\Http\Resources\POperationDocumentResources\POperationDocumentResource;
use App\Models\POperationDocument;
use App\Services\POperationDocumentServices\POperationDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class POperationDocumentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'operation-document non trouvé.';

    public function __construct(private POperationDocumentService $pOperationDocumentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pOperationDocuments = $this->pOperationDocumentService->getAll($request->all());

        return response()->json(
            new POperationDocumentCollection($pOperationDocuments)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(POperationDocumentStoreRequest $request): JsonResponse
    {
        $pOperationDocument = $this->pOperationDocumentService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.operation-document.create'),
                'data' => new POperationDocumentResource($pOperationDocument),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(POperationDocument $pOperationDocument): JsonResponse
    {

        return response()->json(new POperationDocumentResource($pOperationDocument));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(POperationDocumentUpdateRequest $request, POperationDocument $pOperationDocument): JsonResponse
    {

        $this->pOperationDocumentService->edit($request->validated(), $pOperationDocument);

        return response()->json([
            'message' => __('responses.operation-document.update'),
            'data' => new POperationDocumentResource($pOperationDocument),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(POperationDocument $pOperationDocument, Request $request): JsonResponse
    {

        $this->pOperationDocumentService->delete($pOperationDocument);

        return response()->json(['message' => __('responses.operation-document.update'), 202]);
    }
}
