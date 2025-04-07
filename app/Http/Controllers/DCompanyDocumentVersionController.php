<?php

namespace App\Http\Controllers;

use App\Http\Requests\DCompanyDocumentVersionRequests\DCompanyDocumentVersionStoreRequest;
use App\Http\Requests\DCompanyDocumentVersionRequests\DCompanyDocumentVersionUpdateRequest;
use App\Http\Resources\DCompanyDocumentVersionResources\DCompanyDocumentVersionCollection;
use App\Http\Resources\DCompanyDocumentVersionResources\DCompanyDocumentVersionResource;
use App\Models\DCompanyDocumentVersion;
use App\Services\DCompanyDocumentVersionServices\DCompanyDocumentVersionService;
use App\Services\DDocumentServices\DDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DCompanyDocumentVersionController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'company-document-version non trouvé.';

    public function __construct(private DCompanyDocumentVersionService $dCompanyDocumentVersionService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dCompanyDocumentVersions = $this->dCompanyDocumentVersionService->getAll($request->all());

        return response()->json(
            new DCompanyDocumentVersionCollection($dCompanyDocumentVersions)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DCompanyDocumentVersionStoreRequest $request): JsonResponse
    {
        $dCompanyDocumentVersion = $this->dCompanyDocumentVersionService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.company-document-version.create'),
                'data' => new DCompanyDocumentVersionResource($dCompanyDocumentVersion),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DCompanyDocumentVersion $dCompanyDocumentVersion): JsonResponse
    {

        return response()->json(new DCompanyDocumentVersionResource($dCompanyDocumentVersion));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DCompanyDocumentVersionUpdateRequest $request, DCompanyDocumentVersion $dCompanyDocumentVersion): JsonResponse
    {

        $this->dCompanyDocumentVersionService->edit($request->validated(), $dCompanyDocumentVersion);

        return response()->json([
            'message' => __('responses.company-document-version.update'),
            'data' => new DCompanyDocumentVersionResource($dCompanyDocumentVersion),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DCompanyDocumentVersion $dCompanyDocumentVersion, Request $request): JsonResponse
    {
        $this->dCompanyDocumentVersionService->delete($dCompanyDocumentVersion);

        return response()->json(['message' => __('actions.success')]);
    }

    public function download(DCompanyDocumentVersion $dCompanyDocumentVersion)
    {
        [
            $contents,
            $headers
        ] = (new DDocumentService())->downloadDocument(
            $dCompanyDocumentVersion->path,
            'inline',
            $dCompanyDocumentVersion->name . '.' . $dCompanyDocumentVersion->extension
        );

        if (!$contents) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response($contents, 200, $headers);
    }

    public function setDefaultVersion(DCompanyDocumentVersion $dCompanyDocumentVersion)
    {
        $this->dCompanyDocumentVersionService->setDefaultVersion($dCompanyDocumentVersion);

        return response()->json(['message' => 'La version par défaut est modifié avec succée.'], 200);
    }
}
