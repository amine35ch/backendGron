<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectInvoiceLineRequests\DProjectInvoiceLineStoreRequest;
use App\Http\Requests\DProjectInvoiceLineRequests\DProjectInvoiceLineUpdateRequest;
use App\Http\Resources\DProjectInvoiceLineResources\DProjectInvoiceLineCollection;
use App\Http\Resources\DProjectInvoiceLineResources\DProjectInvoiceLineResource;
use App\Models\DProjectInvoiceLine;
use App\Services\DProjectInvoiceLineServices\DProjectInvoiceLineService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectInvoiceLineController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-invoice-line non trouvé.';

    public function __construct(private DProjectInvoiceLineService $dProjectInvoiceLineService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectInvoiceLines = $this->dProjectInvoiceLineService->getAll($request->all());

        return response()->json(
            new DProjectInvoiceLineCollection($dProjectInvoiceLines)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectInvoiceLineStoreRequest $request): JsonResponse
    {
        $dProjectInvoiceLine = $this->dProjectInvoiceLineService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.project-invoice-line.create'),
                'data' => new DProjectInvoiceLineResource($dProjectInvoiceLine),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectInvoiceLine $dProjectInvoiceLine): JsonResponse
    {

        return response()->json(new DProjectInvoiceLineResource($dProjectInvoiceLine));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectInvoiceLineUpdateRequest $request, DProjectInvoiceLine $dProjectInvoiceLine): JsonResponse
    {

        $this->dProjectInvoiceLineService->edit($request->validated(), $dProjectInvoiceLine);

        return response()->json([
            'message' => __('responses.project-invoice-line.update'),
            'data' => new DProjectInvoiceLineResource($dProjectInvoiceLine),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectInvoiceLine $dProjectInvoiceLine, Request $request): JsonResponse
    {

        $this->dProjectInvoiceLineService->delete($dProjectInvoiceLine);

        return response()->json(['message' => __('responses.project-invoice-line.update'), 202]);
    }
}
