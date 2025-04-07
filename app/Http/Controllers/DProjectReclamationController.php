<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectReclamationRequests\DProjectReclamationStoreRequest;
use App\Http\Requests\DProjectReclamationRequests\DProjectReclamationUpdateRequest;
use App\Http\Resources\DProjectReclamationResources\DProjectReclamationCollection;
use App\Http\Resources\DProjectReclamationResources\DProjectReclamationResource;
use App\Models\DProjectReclamation;
use App\Services\DProjectReclamationServices\DProjectReclamationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectReclamationController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Réclamation non trouvé.';

    public function __construct(private DProjectReclamationService $dProjectReclamationService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectReclamations = $this->dProjectReclamationService->getAll($request->all());

        return response()->json(
            new DProjectReclamationCollection($dProjectReclamations)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectReclamationStoreRequest $request): JsonResponse
    {
        $dProjectReclamation = $this->dProjectReclamationService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('actions.success'),
                'data' => new DProjectReclamationResource($dProjectReclamation),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectReclamation $dProjectReclamation): JsonResponse
    {

        return response()->json(new DProjectReclamationResource($dProjectReclamation));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        DProjectReclamationUpdateRequest $request,
        DProjectReclamation $dProjectReclamation
    ): JsonResponse {

        $this->dProjectReclamationService->edit($request->validated(), $dProjectReclamation);

        return response()->json(['message' => __('actions.success'),
            'data' => new DProjectReclamationResource($dProjectReclamation),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectReclamation $dProjectReclamation, Request $request): JsonResponse
    {

        $this->dProjectReclamationService->delete($dProjectReclamation);

        return response()->json(['message' => __('actions.success'), 202]);
    }
}
