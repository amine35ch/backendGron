<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectInvoiceHeaderRequests\DProjectInvoiceHeaderStoreRequest;
use App\Http\Requests\DProjectInvoiceHeaderRequests\DProjectInvoiceHeaderUpdateRequest;
use App\Http\Resources\DProjectInvoiceHeaderResources\DProjectInvoiceHeaderCollection;
use App\Http\Resources\DProjectInvoiceHeaderResources\DProjectInvoiceHeaderResource;
use App\Models\DProjectInvoiceHeader;
use App\Services\DProjectInvoiceHeaderServices\DProjectInvoiceHeaderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectInvoiceHeaderController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-invoice-header non trouvé.';

    public function __construct(private DProjectInvoiceHeaderService $dProjectInvoiceHeaderService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectInvoiceHeaders = $this->dProjectInvoiceHeaderService->getAll($request->all());

        return response()->json(
            new DProjectInvoiceHeaderCollection($dProjectInvoiceHeaders)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectInvoiceHeaderStoreRequest $request): JsonResponse
    {
        $dProjectInvoiceHeader = $this->dProjectInvoiceHeaderService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.project-invoice-header.create'),
                'data' => new DProjectInvoiceHeaderResource($dProjectInvoiceHeader),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectInvoiceHeader $dProjectInvoiceHeader): JsonResponse
    {

        return response()->json(new DProjectInvoiceHeaderResource($dProjectInvoiceHeader));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        DProjectInvoiceHeaderUpdateRequest $request,
        DProjectInvoiceHeader $dProjectInvoiceHeader
    ): JsonResponse {

        $this->dProjectInvoiceHeaderService->edit($request->validated(), $dProjectInvoiceHeader);

        return response()->json([
            'message' => __('responses.project-invoice-header.update'),
            'data' => new DProjectInvoiceHeaderResource($dProjectInvoiceHeader),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectInvoiceHeader $dProjectInvoiceHeader, Request $request): JsonResponse
    {

        $this->dProjectInvoiceHeaderService->delete($dProjectInvoiceHeader);

        return response()->json(['message' => __('responses.project-invoice-header.update'), 202]);
    }




}
