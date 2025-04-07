<?php

namespace App\Http\Controllers;

use App\Http\Requests\DClientDocumentRequests\DClientDocumentStoreRequest;
use App\Http\Requests\DClientDocumentRequests\DClientDocumentUpdateRequest;
use App\Http\Resources\DClientDocumentResources\DClientDocumentCollection;
use App\Http\Resources\DClientDocumentResources\DClientDocumentResource;
use App\Models\DClientDocument;
use App\Services\DClientDocumentServices\DClientDocumentService;
use App\Services\DDocumentServices\DDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DClientDocumentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'client-document non trouvé.';

    public function __construct(private DClientDocumentService $dClientDocumentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dClientDocuments = $this->dClientDocumentService->getAll($request->all());

        return response()->json(
            new DClientDocumentCollection($dClientDocuments)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DClientDocumentStoreRequest $request): JsonResponse
    {
        $dClientDocument = $this->dClientDocumentService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.client-document.create'),
                'data' => new DClientDocumentResource($dClientDocument),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DClientDocument $dClientDocument): JsonResponse
    {
        return response()->json(new DClientDocumentResource($dClientDocument));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DClientDocumentUpdateRequest $request, DClientDocument $dClientDocument): JsonResponse
    {

        $this->dClientDocumentService->edit($request->validated(), $dClientDocument);

        return response()->json([
            'message' => __('actions.success'),
            'data' => new DClientDocumentResource($dClientDocument),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DClientDocument $dClientDocument, Request $request): JsonResponse
    {

        $this->dClientDocumentService->delete($dClientDocument);

        return response()->json(['message' => __('actions.success')], 202);
    }

    public function download(DClientDocument $dClientDocument)
    {
        if (! $dClientDocument->path) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }
        [
            $contents,
            $headers
        ] = (new DDocumentService())->downloadDocument(
            $dClientDocument->path,
            'inline',
            $dClientDocument->name.'.'.$dClientDocument->extension
        );

        if (! $contents) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response($contents, 200, $headers);
    }
}
