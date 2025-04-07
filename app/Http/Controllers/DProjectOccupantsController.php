<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectOccupantsRequests\DProjectOccupantsStoreRequest;
use App\Http\Requests\DProjectOccupantsRequests\DProjectOccupantsUpdateRequest;
use App\Http\Resources\DProjectOccupantsResources\DProjectOccupantsResource;
use App\Models\DProject;
use App\Models\DProjectOccupants;
use App\Services\DProjectOccupantsServices\DProjectOccupantsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectOccupantsController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-occupant non trouvé.';

    public function __construct(private DProjectOccupantsService $dProjectOccupantsService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOccupantsByProject(DProject $dProject, Request $request)
    {
        $dProjectOccupants = $this->dProjectOccupantsService->getOccupants($dProject);

        return response()->json($dProjectOccupants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectOccupantsStoreRequest $request, DProject $dProject): JsonResponse
    {
        $this->dProjectOccupantsService
            ->create($request->validated(), $dProject->id);

        return response()->json(
            [
                'message' => __('actions.success'),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectOccupants $dProjectOccupants): JsonResponse
    {

        return response()->json(new DProjectOccupantsResource($dProjectOccupants));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectOccupantsUpdateRequest $request, DProjectOccupants $dProjectOccupants): JsonResponse
    {

        $this->dProjectOccupantsService->edit($request->validated(), $dProjectOccupants);

        return response()->json([
            'message' => __('responses.project-occupant.update'),
            'data' => new DProjectOccupantsResource($dProjectOccupants),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectOccupants $dProjectOccupants, Request $request): JsonResponse
    {

        $this->dProjectOccupantsService->delete($dProjectOccupants);

        return response()->json(['message' => __('responses.project-occupant.update'), 202]);
    }
}
