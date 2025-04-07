<?php

namespace App\Http\Controllers;

use App\Http\Requests\DInvoiceReferenceRequests\DInvoiceReferenceStoreRequest;
use App\Http\Requests\DInvoiceReferenceRequests\DInvoiceReferenceUpdateRequest;
use App\Http\Resources\DInvoiceReferenceResources\DInvoiceReferenceCollection;
use App\Http\Resources\DInvoiceReferenceResources\DInvoiceReferenceResource;
use App\Models\DInvoiceReference;
use App\Services\DInvoiceReferenceServices\DInvoiceReferenceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DInvoiceReferenceController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'invoice-reference non trouvé.';

    public function __construct(private DInvoiceReferenceService $dInvoiceReferenceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dInvoiceReferences = $this->dInvoiceReferenceService->getAll($request->all());

        return response()->json(
            new DInvoiceReferenceCollection($dInvoiceReferences)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DInvoiceReferenceStoreRequest $request): JsonResponse
    {
        $dInvoiceReference = $this->dInvoiceReferenceService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.invoice-reference.create'),
                'data' => new DInvoiceReferenceResource($dInvoiceReference),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DInvoiceReference $dInvoiceReference): JsonResponse
    {

        return response()->json(new DInvoiceReferenceResource($dInvoiceReference));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DInvoiceReferenceUpdateRequest $request, DInvoiceReference $dInvoiceReference): JsonResponse
    {

        $this->dInvoiceReferenceService->edit($request->validated(), $dInvoiceReference);

        return response()->json([
            'message' => __('responses.invoice-reference.update'),
            'data' => new DInvoiceReferenceResource($dInvoiceReference),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DInvoiceReference $dInvoiceReference, Request $request): JsonResponse
    {

        $this->dInvoiceReferenceService->delete($dInvoiceReference);

        return response()->json(['message' => __('responses.invoice-reference.update'), 202]);
    }
}
