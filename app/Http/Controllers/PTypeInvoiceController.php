<?php

namespace App\Http\Controllers;

use App\Http\Requests\PTypeInvoiceRequests\PTypeInvoiceStoreRequest;
use App\Http\Requests\PTypeInvoiceRequests\PTypeInvoiceUpdateRequest;
use App\Http\Resources\PTypeInvoiceResources\PTypeInvoiceCollection;
use App\Http\Resources\PTypeInvoiceResources\PTypeInvoiceResource;
use App\Models\PTypeInvoice;
use App\Services\PTypeInvoiceServices\PTypeInvoiceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PTypeInvoiceController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'type-invoice non trouvé.';

    public function __construct(private PTypeInvoiceService $pTypeInvoiceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pTypeInvoices = $this->pTypeInvoiceService->getAll($request->all());

        return response()->json(
            new PTypeInvoiceCollection($pTypeInvoices)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PTypeInvoiceStoreRequest $request): JsonResponse
    {
        $pTypeInvoice = $this->pTypeInvoiceService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.type-invoice.create'),
                'data' => new PTypeInvoiceResource($pTypeInvoice),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PTypeInvoice $pTypeInvoice): JsonResponse
    {

        return response()->json(new PTypeInvoiceResource($pTypeInvoice));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PTypeInvoiceUpdateRequest $request, PTypeInvoice $pTypeInvoice): JsonResponse
    {

        $this->pTypeInvoiceService->edit($request->validated(), $pTypeInvoice);

        return response()->json([
            'message' => __('responses.type-invoice.update'),
            'data' => new PTypeInvoiceResource($pTypeInvoice),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PTypeInvoice $pTypeInvoice, Request $request): JsonResponse
    {

        $this->pTypeInvoiceService->delete($pTypeInvoice);

        return response()->json(['message' => __('responses.type-invoice.update'), 202]);
    }
}
