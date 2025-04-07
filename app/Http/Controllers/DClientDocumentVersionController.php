<?php

namespace App\Http\Controllers;

use App\Http\Requests\DClientDocumentVersionRequests\DClientDocumentVersionStoreRequest;
use App\Http\Requests\DClientDocumentVersionRequests\DClientDocumentVersionUpdateRequest;
use App\Http\Resources\DClientDocumentVersionResources\DClientDocumentVersionCollection;
use App\Http\Resources\DClientDocumentVersionResources\DClientDocumentVersionResource;
use App\Models\DClientDocumentVersion;
use App\Services\DClientDocumentVersionServices\DClientDocumentVersionService;
use App\Services\DDocumentServices\DDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DClientDocumentVersionController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'client_document_versions non trouvé.';

    public function __construct(private DClientDocumentVersionService $dClientDocumentVersionService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dClientDocumentVersions = $this->dClientDocumentVersionService->getAll($request->all());

        return response()->json(
            new DClientDocumentVersionCollection($dClientDocumentVersions)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DClientDocumentVersionStoreRequest $request): JsonResponse
    {
        $dClientDocumentVersion = $this->dClientDocumentVersionService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('actions.success'),
                'data' => new DClientDocumentVersionResource($dClientDocumentVersion),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DClientDocumentVersion $dClientDocumentVersion): JsonResponse
    {

        return response()->json(new DClientDocumentVersionResource($dClientDocumentVersion));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        DClientDocumentVersionUpdateRequest $request,
        DClientDocumentVersion $dClientDocumentVersion
    ): JsonResponse {

        $this->dClientDocumentVersionService->edit($request->validated(), $dClientDocumentVersion);

        return response()->json([
            'message' => __('actions.success'),
            'data' => new DClientDocumentVersionResource($dClientDocumentVersion),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DClientDocumentVersion $dClientDocumentVersion, Request $request): JsonResponse
    {

        $this->dClientDocumentVersionService->delete($dClientDocumentVersion);

        return response()->json(['message' => __('actions.success')], 201);
    }

    public function download(DClientDocumentVersion $dClientDocumentVersion)
    {

        [
            $contents,
            $headers
        ] = (new DDocumentService())->downloadDocument(
            $dClientDocumentVersion->path,
            'inline',
            $dClientDocumentVersion->name . '.' . $dClientDocumentVersion->extension
        );

        if (!$contents) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response($contents, 200, $headers);
    }

    public function setDefaultVersion(DClientDocumentVersion $dClientDocumentVersion)
    {
        $this->dClientDocumentVersionService->setDefaultVersion($dClientDocumentVersion);

        return response()->json(['message' => 'La version par défaut est modifié avec succée.'], 200);
    }
}
