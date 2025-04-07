<?php

namespace App\Http\Controllers;

use App\Http\Requests\DCompanyDocumentRequests\DCompanyDocumentStoreRequest;
use App\Http\Requests\DCompanyDocumentRequests\DCompanyDocumentUpdateRequest;
use App\Http\Resources\DCompanyDocumentResources\DCompanyDocumentCollection;
use App\Http\Resources\DCompanyDocumentResources\DCompanyDocumentResource;
use App\Models\DCompanyDocument;
use App\Services\DCompanyDocumentServices\DCompanyDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DCompanyDocumentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'company-document non trouvé.';

    public function __construct(private DCompanyDocumentService $dCompanyDocumentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dCompanyDocuments = $this->dCompanyDocumentService->getAll($request->all());

        return response()->json(
            new DCompanyDocumentCollection($dCompanyDocuments)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DCompanyDocumentStoreRequest $request): JsonResponse
    {
        $dCompanyDocument = $this->dCompanyDocumentService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.company-document.create'),
                'data' => new DCompanyDocumentResource($dCompanyDocument),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DCompanyDocument $dCompanyDocument): JsonResponse
    {

        return response()->json(new DCompanyDocumentResource($dCompanyDocument));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DCompanyDocumentUpdateRequest $request, DCompanyDocument $dCompanyDocument): JsonResponse
    {

        $this->dCompanyDocumentService->edit($request->validated(), $dCompanyDocument);

        return response()->json([
            'message' => __('responses.company-document.update'),
            'data' => new DCompanyDocumentResource($dCompanyDocument),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DCompanyDocument $dCompanyDocument, Request $request): JsonResponse
    {

        $this->dCompanyDocumentService->delete($dCompanyDocument);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }
}
