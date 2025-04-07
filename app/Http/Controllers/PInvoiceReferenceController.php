<?php

namespace App\Http\Controllers;

use App\Http\Requests\PInvoiceReferenceRequests\PInvoiceReferenceStoreRequest;
use App\Http\Requests\PInvoiceReferenceRequests\PInvoiceReferenceUpdateRequest;
use App\Http\Resources\PInvoiceReferenceResources\PInvoiceReferenceCollection;
use App\Http\Resources\PInvoiceReferenceResources\PInvoiceReferenceResource;
use App\Models\PInvoiceReference;
use App\Services\PInvoiceReferenceServices\PInvoiceReferenceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PInvoiceReferenceController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'p-invoice-reference non trouvé.';

    public function __construct(private PInvoiceReferenceService $pInvoiceReferenceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pInvoiceReferences = $this->pInvoiceReferenceService->getAll($request->all());

        return response()->json(
            new PInvoiceReferenceCollection($pInvoiceReferences)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PInvoiceReferenceStoreRequest $request): JsonResponse
    {
        $pInvoiceReference = $this->pInvoiceReferenceService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.p-invoice-reference.create'),
                'data' => new PInvoiceReferenceResource($pInvoiceReference),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PInvoiceReference $pInvoiceReference): JsonResponse
    {

        return response()->json(new PInvoiceReferenceResource($pInvoiceReference));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PInvoiceReferenceUpdateRequest $request, PInvoiceReference $pInvoiceReference): JsonResponse
    {

        $this->pInvoiceReferenceService->edit($request->validated(), $pInvoiceReference);

        return response()->json([
            'message' => __('responses.p-invoice-reference.update'),
            'data' => new PInvoiceReferenceResource($pInvoiceReference),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PInvoiceReference $pInvoiceReference, Request $request): JsonResponse
    {

        $this->pInvoiceReferenceService->delete($pInvoiceReference);

        return response()->json(['message' => __('responses.p-invoice-reference.update'), 202]);
    }
}
