<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectReferenceRequests\DProjectReferenceStoreRequest;
use App\Http\Requests\DProjectReferenceRequests\DProjectReferenceUpdateRequest;
use App\Http\Resources\DProjectReferenceResources\DProjectReferenceCollection;
use App\Http\Resources\DProjectReferenceResources\DProjectReferenceResource;
use App\Models\DProjectReference;
use App\Services\DProjectReferenceServices\DProjectReferenceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectReferenceController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-reference non trouvé.';

    public function __construct(private DProjectReferenceService $dProjectReferenceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectReferences = $this->dProjectReferenceService->getAll($request->all());

        return response()->json(
            new DProjectReferenceCollection($dProjectReferences)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectReferenceStoreRequest $request): JsonResponse
    {
        $dProjectReference = $this->dProjectReferenceService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.project-reference.create'),
                'data' => new DProjectReferenceResource($dProjectReference),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectReference $dProjectReference): JsonResponse
    {

        return response()->json(new DProjectReferenceResource($dProjectReference));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectReferenceUpdateRequest $request, DProjectReference $dProjectReference): JsonResponse
    {

        $this->dProjectReferenceService->edit($request->validated(), $dProjectReference);

        return response()->json([
            'message' => __('responses.project-reference.update'),
            'data' => new DProjectReferenceResource($dProjectReference),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectReference $dProjectReference, Request $request): JsonResponse
    {

        $this->dProjectReferenceService->delete($dProjectReference);

        return response()->json(['message' => __('responses.project-reference.update'), 202]);
    }
}
