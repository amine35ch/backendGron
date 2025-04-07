<?php

namespace App\Http\Controllers;

use App\Http\Requests\DThirdPartyDocumentVersionRequests\DThirdPartyDocumentVersionStoreRequest;
use App\Http\Requests\DThirdPartyDocumentVersionRequests\DThirdPartyDocumentVersionUpdateRequest;
use App\Http\Resources\DThirdPartyDocumentVersionResources\DThirdPartyDocumentVersionCollection;
use App\Http\Resources\DThirdPartyDocumentVersionResources\DThirdPartyDocumentVersionResource;
use App\Models\DThirdPartyDocumentVersion;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DThirdPartyDocumentVersionServices\DThirdPartyDocumentVersionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DThirdPartyDocumentVersionController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'third_party_document_version non trouvé.';

    public function __construct(private DThirdPartyDocumentVersionService $dThirdPartyDocumentVersionService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dThirdPartyDocumentVersions = $this->dThirdPartyDocumentVersionService->getAll($request->all());

        return response()->json(
            new DThirdPartyDocumentVersionCollection($dThirdPartyDocumentVersions)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DThirdPartyDocumentVersionStoreRequest $request): JsonResponse
    {
        $dThirdPartyDocumentVersion = $this->dThirdPartyDocumentVersionService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.third_party_document_version.create'),
                'data' => new DThirdPartyDocumentVersionResource($dThirdPartyDocumentVersion),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DThirdPartyDocumentVersion $dThirdPartyDocumentVersion): JsonResponse
    {

        return response()->json(new DThirdPartyDocumentVersionResource($dThirdPartyDocumentVersion));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DThirdPartyDocumentVersionUpdateRequest $request, DThirdPartyDocumentVersion $dThirdPartyDocumentVersion): JsonResponse
    {

        $this->dThirdPartyDocumentVersionService->edit($request->validated(), $dThirdPartyDocumentVersion);

        return response()->json([
            'message' => __('actions.success'),
            'data' => new DThirdPartyDocumentVersionResource($dThirdPartyDocumentVersion),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DThirdPartyDocumentVersion $dThirdPartyDocumentVersion, Request $request): JsonResponse
    {

        $this->dThirdPartyDocumentVersionService->delete($dThirdPartyDocumentVersion);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function download(DThirdPartyDocumentVersion $dThirdPartyDocumentVersion)
    {

        $response = (new DDocumentService())->downloadDocument(
            $dThirdPartyDocumentVersion->path,
            'inline',
            $dThirdPartyDocumentVersion->name
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
