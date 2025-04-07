<?php

namespace App\Http\Controllers;

use App\Models\DCompanyProjectDocs;
use App\Http\Requests\DCompanyProjectDocsRequests\DCompanyProjectDocsStoreRequest;
use App\Http\Requests\DCompanyProjectDocsRequests\DCompanyProjectDocsUpdateRequest;
use App\Http\Resources\DCompanyProjectDocsResources\DCompanyProjectDocsResource;
use App\Http\Resources\DCompanyProjectDocsResources\DCompanyProjectDocsCollection;
use App\Services\DCompanyProjectDocsServices\DCompanyProjectDocsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DCompanyProjectDocsController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'CompanyProjectDocs non trouvé.';

    public function __construct(private DCompanyProjectDocsService $dCompanyProjectDocsService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dCompanyProjectDocss = $this->dCompanyProjectDocsService->getAll($request->all());

        return response()->json(
            new DCompanyProjectDocsCollection($dCompanyProjectDocss)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(DCompanyProjectDocsStoreRequest $request): JsonResponse
    {
        $dCompanyProjectDocs= $this->dCompanyProjectDocsService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.CompanyProjectDocs.create'),
                'data' => new DCompanyProjectDocsResource($dCompanyProjectDocs)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(DCompanyProjectDocs $dCompanyProjectDocs): JsonResponse
    {

        return response()->json(new DCompanyProjectDocsResource ($dCompanyProjectDocs));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(DCompanyProjectDocsUpdateRequest $request, DCompanyProjectDocs $dCompanyProjectDocs): JsonResponse
    {

        $this->dCompanyProjectDocsService->edit($request->validated(), $dCompanyProjectDocs);
        return response()->json([
            'message' => __('responses.CompanyProjectDocs.update'),
            'data' => new DCompanyProjectDocsResource ($dCompanyProjectDocs)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(DCompanyProjectDocs $dCompanyProjectDocs, Request $request): JsonResponse
    {

        $this->dCompanyProjectDocsService->delete($dCompanyProjectDocs);

        return response()->json([ 'message' => __('responses.CompanyProjectDocs.update'), 202]);
    }
}
