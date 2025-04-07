<?php

namespace App\Http\Controllers;

use App\Http\Requests\DThirdPartyDocumentRequests\DThirdPartyDocumentStoreRequest;
use App\Http\Requests\DThirdPartyDocumentRequests\DThirdPartyDocumentUpdateRequest;
use App\Http\Resources\DThirdPartyDocumentResources\DThirdPartyDocumentCollection;
use App\Http\Resources\DThirdPartyDocumentResources\DThirdPartyDocumentResource;
use App\Models\DThirdPartyDocument;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DThirdPartyDocumentServices\DThirdPartyDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DThirdPartyDocumentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'installer-document non trouvé.';

    public function __construct(private DThirdPartyDocumentService $dThirdPartyDocumentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dThirdPartyDocuments = $this->dThirdPartyDocumentService->getAll($request->all());

        return response()->json(
            new DThirdPartyDocumentCollection($dThirdPartyDocuments)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DThirdPartyDocumentStoreRequest $request): JsonResponse
    {
        $dThirdPartyDocument = $this->dThirdPartyDocumentService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.installer-document.create'),
                'data' => new DThirdPartyDocumentResource($dThirdPartyDocument),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DThirdPartyDocument $dThirdPartyDocument): JsonResponse
    {

        return response()->json(new DThirdPartyDocumentResource($dThirdPartyDocument));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        DThirdPartyDocumentUpdateRequest $request,
        DThirdPartyDocument $dThirdPartyDocument
    ): JsonResponse {

        $this->dThirdPartyDocumentService->edit($request->validated(), $dThirdPartyDocument);

        return response()->json([
            'message' => __('actions.success'),
            'data' => new DThirdPartyDocumentResource($dThirdPartyDocument),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DThirdPartyDocument $dThirdPartyDocument, Request $request): JsonResponse
    {

        $this->dThirdPartyDocumentService->delete($dThirdPartyDocument);

        return response()->json(['message' => __('actions.success')], 202);
    }

    public function download(DThirdPartyDocument $dThirdPartyDocument)
    {
        if (! $dThirdPartyDocument->path) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }
        $response = (new DDocumentService())->downloadDocument(
            $dThirdPartyDocument->path,
            'inline',
            $dThirdPartyDocument->name
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
