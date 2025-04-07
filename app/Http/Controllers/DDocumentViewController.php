<?php

namespace App\Http\Controllers;

use App\Models\DDocumentView;
use App\Http\Requests\DDocumentViewRequests\DDocumentViewStoreRequest;
use App\Http\Requests\DDocumentViewRequests\DDocumentViewUpdateRequest;
use App\Http\Resources\DDocumentViewResources\DDocumentViewResource;
use App\Http\Resources\DDocumentViewResources\DDocumentViewCollection;
use App\Models\DProject;
use App\Models\PDocument;
use App\Services\DDocumentViewServices\DDocumentViewService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DDocumentViewController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'd-document-view non trouvé.';

    public function __construct(private DDocumentViewService $dDocumentViewService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dDocumentViews = $this->dDocumentViewService->getAll($request->all());

        return response()->json(
            new DDocumentViewCollection($dDocumentViews)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(DProject $dProject, PDocument $pDocument)
    {
        $dDocumentView= $this->dDocumentViewService
            ->create($dProject,$pDocument);

    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(DDocumentView $dDocumentView): JsonResponse
    {

        return response()->json(new DDocumentViewResource ($dDocumentView));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(DDocumentViewUpdateRequest $request, DDocumentView $dDocumentView): JsonResponse
    {

        $this->dDocumentViewService->edit($request->validated(), $dDocumentView);
        return response()->json([
            'message' => __('responses.d-document-view.update'),
            'data' => new DDocumentViewResource ($dDocumentView)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(DDocumentView $dDocumentView, Request $request): JsonResponse
    {

        $this->dDocumentViewService->delete($dDocumentView);

        return response()->json([ 'message' => __('responses.d-document-view.update'), 202]);
    }
}
