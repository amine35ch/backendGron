<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectDocumentRequests\DigiSignCallBackRequest;
use App\Http\Requests\DProjectDocumentRequests\DProjectDocumentStoreRequest;
use App\Http\Requests\DProjectDocumentRequests\DProjectDocumentUpdateRequest;
use App\Http\Resources\DProjectDocumentResources\DProjectDocumentCollection;
use App\Http\Resources\DProjectDocumentResources\DProjectDocumentResource;
use App\Models\DProjectDocument;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DocuSignServices\DocuSignService;
use App\Services\DProjectDocumentServices\DProjectDocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectDocumentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-document non trouvé.';

    public function __construct(private DProjectDocumentService $dProjectDocumentService) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectDocuments = $this->dProjectDocumentService->getAll($request->all());

        return response()->json(
            new DProjectDocumentCollection($dProjectDocuments)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectDocumentStoreRequest $request): JsonResponse
    {
        $dProjectDocument = $this->dProjectDocumentService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'project-document a été créer avec succès.',
                'data' => new DProjectDocumentResource($dProjectDocument),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectDocument $dProjectDocument): JsonResponse
    {

        return response()->json(new DProjectDocumentResource($dProjectDocument));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectDocumentUpdateRequest $request, DProjectDocument $dProjectDocument): JsonResponse
    {

        $this->dProjectDocumentService->edit($request->validated(), $dProjectDocument);

        return response()->json([
            'message' => 'Le project-document est modifié avec succée.',
            'data' => new DProjectDocumentResource($dProjectDocument),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectDocument $dProjectDocument, Request $request): JsonResponse
    {
        $this->dProjectDocumentService->delete($dProjectDocument);

        return response()->json(['message' => __('actions.success')], 202);
    }

    public function download(DProjectDocument $dProjectDocument)
    {
        if (!$dProjectDocument->path) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }
        [
            $contents,
            $headers
        ] = (new DDocumentService())->downloadDocument(
            $dProjectDocument->path,
            'inline',
            $dProjectDocument->name . '.' . $dProjectDocument->extension
        );

        if (!$contents) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response($contents, 200, $headers);
    }

    public function checkSignedDocs(DigiSignCallBackRequest $request)
    {

        $docuSignService = new DocuSignService();
        $docuSignService->attachSignedDocument($request->document_id);
        return response()->json('DIGISIGNER_EVENT_ACCEPTED.', 200);
    }

    public function getStepStoreDocuments()
    {
        $this->authorize('view projects');
        $documents = $this->dProjectDocumentService->getStepStoreDocuments();

        return response()->json($documents, 200);
    }

    public function updateDefaultToEachDocumentVersionDefault()
    {
        $this->dProjectDocumentService->updateDefaultToEachDocumentVersionDefault();
        return response()->json('Les versions par défaut sont modifiées avec succès.', 200);
    }
}
