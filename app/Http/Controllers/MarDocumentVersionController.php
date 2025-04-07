<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarDocumentVersionRequests\MarDocumentVersionStoreRequest;
use App\Http\Requests\MarDocumentVersionRequests\MarDocumentVersionUpdateRequest;
use App\Http\Resources\MarDocumentVersionResources\MarDocumentVersionCollection;
use App\Http\Resources\MarDocumentVersionResources\MarDocumentVersionResource;
use App\Models\MarDocumentVersion;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\MarDocumentVersionServices\MarDocumentVersionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MarDocumentVersionController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'mar_document_versions non trouvé.';

    public function __construct(private MarDocumentVersionService $companyDocumentVersionService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companyDocumentVersions = $this->marDocumentVersionService->getAll($request->all());

        return response()->json(
            new MarDocumentVersionCollection($companyDocumentVersions)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarDocumentVersionStoreRequest $request): JsonResponse
    {
        $companyDocumentVersion = $this->marDocumentVersionService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('actions.success'),
                'data' => new MarDocumentVersionResource($companyDocumentVersion),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(MarDocumentVersion $companyDocumentVersion): JsonResponse
    {

        return response()->json(new MarDocumentVersionResource($companyDocumentVersion));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        MarDocumentVersionUpdateRequest $request,
        MarDocumentVersion $companyDocumentVersion
    ): JsonResponse {

        $this->marDocumentVersionService->edit($request->validated(), $companyDocumentVersion);

        return response()->json([
            'message' => __('actions.success'),
            'data' => new MarDocumentVersionResource($companyDocumentVersion),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MarDocumentVersion $companyDocumentVersion, Request $request): JsonResponse
    {

        $this->marDocumentVersionService->delete($companyDocumentVersion);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function download(MarDocumentVersion $companyDocumentVersion)
    {

        $response = (new DDocumentService())->downloadDocument(
            $companyDocumentVersion->path,
            'inline',
            $companyDocumentVersion->name
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
