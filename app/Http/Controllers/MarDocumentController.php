<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarDocumentRequests\MarDocumentStoreRequest;
use App\Http\Requests\MarDocumentRequests\MarDocumentUpdateRequest;
use App\Http\Resources\MarDocumentResources\MarDocumentCollection;
use App\Http\Resources\MarDocumentResources\MarDocumentResource;
use App\Models\MarDocument;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\MarDocumentServices\MarDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MarDocumentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'mar-document non trouvé.';

    public function __construct(private MarDocumentService $companyDocumentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companyDocuments = $this->marDocumentService->getAll($request->all());

        return response()->json(
            new MarDocumentCollection($companyDocuments)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarDocumentStoreRequest $request): JsonResponse
    {
        $companyDocument = $this->marDocumentService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.mar-document.create'),
                'data' => new MarDocumentResource($companyDocument),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(MarDocument $companyDocument): JsonResponse
    {

        return response()->json(new MarDocumentResource($companyDocument));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarDocumentUpdateRequest $request, MarDocument $companyDocument): JsonResponse
    {

        $this->marDocumentService->edit($request->validated(), $companyDocument);

        return response()->json([
            'message' => __('actions.success'),
            'data' => new MarDocumentResource($companyDocument),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MarDocument $companyDocument, Request $request): JsonResponse
    {

        $this->marDocumentService->delete($companyDocument);

        return response()->json(['message' => __('actions.success')], 202);
    }

    public function download(MarDocument $companyDocument)
    {
        if (! $companyDocument->path) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }
        $response = (new DDocumentService())->downloadDocument(
            $companyDocument->path,
            'inline',
            $companyDocument->name
        );

        if (! $response) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return $response;
    }
}
