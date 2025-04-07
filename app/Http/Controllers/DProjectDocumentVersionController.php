<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectDocumentVersionRequests\DProjectDocumentVersionStoreRequest;
use App\Http\Requests\DProjectDocumentVersionRequests\DProjectDocumentVersionUpdateRequest;
use App\Http\Resources\DProjectDocumentVersionResources\DProjectDocumentVersionCollection;
use App\Http\Resources\DProjectDocumentVersionResources\DProjectDocumentVersionResource;
use App\Models\DProjectDocumentVersion;
use App\Services\DocuSignServices\DocuSignService;
use App\Services\DProjectDocumentVersionServices\DProjectDocumentVersionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DProjectDocumentVersionController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'document-versions non trouvé.';

    public function __construct(private DProjectDocumentVersionService $dProjectDocumentVersionService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectDocumentVersions = $this->dProjectDocumentVersionService->getAll($request->all());

        return response()->json(
            new DProjectDocumentVersionCollection($dProjectDocumentVersions)
        );
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @return JsonResponse
    //  */
    // public function store(DProjectDocumentVersionStoreRequest $request): JsonResponse
    // {
    //     $dProjectDocumentVersion= $this->dProjectDocumentVersionService
    //         ->create($request->validated());

    //     return response()->json(
    //         [
    //             'message' => 'document-versions a été créer avec succès.',
    //             'data' => new DProjectDocumentVersionResource($dProjectDocumentVersion)
    //         ],
    //         201
    //     );
    // }

    /**
     * Display the specified resource.
     */
    public function show(DProjectDocumentVersion $dProjectDocumentVersion): JsonResponse
    {

        return response()->json(new DProjectDocumentVersionResource($dProjectDocumentVersion));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(DProjectDocumentVersionUpdateRequest $request, DProjectDocumentVersion $dProjectDocumentVersion): JsonResponse
    // {

    //     $this->dProjectDocumentVersionService->edit($request->validated(), $dProjectDocumentVersion);
    //     return response()->json([
    //         'message' => 'Le document-versions est modifié avec succée.',
    //         'data' => new DProjectDocumentVersionResource ($dProjectDocumentVersion)
    //     ], 200);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectDocumentVersion $dProjectDocumentVersion, Request $request): JsonResponse
    {

        $this->dProjectDocumentVersionService->delete($dProjectDocumentVersion);

        return response()->json(['message' => 'La version est supprimé avec succée.'], 202);
    }

    public function download(DProjectDocumentVersion $dProjectDocumentVersion)
    {

        [$contents, $headers] = $this->dProjectDocumentVersionService->downloadDocument(
            $dProjectDocumentVersion->path,
            'inline',
            $dProjectDocumentVersion->name . '.' . $dProjectDocumentVersion->extension
        );

        if (!$contents) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response($contents, 200, $headers);
    }

    public function setDefaultVersion(DProjectDocumentVersion $dProjectDocumentVersion)
    {
        $this->dProjectDocumentVersionService->setDefaultVersion($dProjectDocumentVersion);

        return response()->json(['message' => 'La version par défaut est modifié avec succée.'], 200);
    }

    public function sendDocumentForSigning(DProjectDocumentVersion $dProjectDocumentVersion)
    {
        // try {
        //     $results = (new DocuSignService())
        //         ->sendDocumentForSigning(
        //             storage_path('app/'.$dProjectDocumentVersion->path),
        //             'romdh4ne@gmail.com',
        //             'Romdhane Mohamed'
        //         );

        //     return response()->json($results);
        // } catch (\Exception $e) {
        //     return response()->json(['message' => $e->getMessage()], 500);
        // }
    }
}
