<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectReclamationWorkRequests\DProjectReclamationWorkStoreRequest;
use App\Http\Requests\DProjectReclamationWorkRequests\DProjectReclamationWorkUpdateRequest;
use App\Http\Resources\DProjectReclamationWorkResources\DProjectReclamationWorkCollection;
use App\Http\Resources\DProjectReclamationWorkResources\DProjectReclamationWorkResource;
use App\Models\DProjectReclamationWork;
use App\Services\DProjectReclamationWorkServices\DProjectReclamationWorkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectReclamationWorkController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-reclamation-work non trouvé.';

    public function __construct(private DProjectReclamationWorkService $dProjectReclamationWorkService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectReclamationWorks = $this->dProjectReclamationWorkService->getAll($request->all());

        return response()->json(
            new DProjectReclamationWorkCollection($dProjectReclamationWorks)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectReclamationWorkStoreRequest $request): JsonResponse
    {
        $dProjectReclamationWork = $this->dProjectReclamationWorkService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.project-reclamation-work.create'),
                'data' => new DProjectReclamationWorkResource($dProjectReclamationWork),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectReclamationWork $dProjectReclamationWork): JsonResponse
    {

        return response()->json(new DProjectReclamationWorkResource($dProjectReclamationWork));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectReclamationWorkUpdateRequest $request, DProjectReclamationWork $dProjectReclamationWork): JsonResponse
    {

        $this->dProjectReclamationWorkService->edit($request->validated(), $dProjectReclamationWork);

        return response()->json([
            'message' => __('responses.project-reclamation-work.update'),
            'data' => new DProjectReclamationWorkResource($dProjectReclamationWork),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectReclamationWork $dProjectReclamationWork, Request $request): JsonResponse
    {

        $this->dProjectReclamationWorkService->delete($dProjectReclamationWork);

        return response()->json(['message' => __('responses.project-reclamation-work.update'), 202]);
    }
}
