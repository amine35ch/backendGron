<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectVisitRequests\DProjectVisitStoreRequest;
use App\Http\Requests\DProjectVisitRequests\DProjectVisitUpdateRequest;
use App\Http\Requests\DProjectVisitRequests\UpdateVisitStateRequest;
use App\Http\Requests\DProjectVisitRequests\ValidationVisitRequest;
use App\Http\Resources\DProjectVisitResources\DProjectVisitCollection;
use App\Http\Resources\DProjectVisitResources\DProjectVisitResource;
use App\Models\DProjectVisit;
use App\Services\DProjectVisitServices\DProjectVisitService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectVisitController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-visit non trouvé.';

    public function __construct(private DProjectVisitService $dProjectVisitService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectVisits = $this->dProjectVisitService->getAll($request->all());

        return response()->json(
            new DProjectVisitCollection($dProjectVisits)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectVisitStoreRequest $request): JsonResponse
    {
        $this->dProjectVisitService
            ->createOrUpdateVisit($request->validated());

        return response()->json(
            [
                'message' => __('responses.visit.create'),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectVisit $dProjectVisit): JsonResponse
    {
        return response()->json(new DProjectVisitResource($dProjectVisit));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectVisitUpdateRequest $request, DProjectVisit $dProjectVisit): JsonResponse
    {
        $this->dProjectVisitService->edit($request->validated(), $dProjectVisit);

        return response()->json([
            'message' => __('responses.visit.update'),
            'data' => new DProjectVisitResource($dProjectVisit),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function validationVisit(
        ValidationVisitRequest $request,
        DProjectVisit $dProjectVisit
    ): JsonResponse {
        $data = $request->validated();
        $this->dProjectVisitService->validationVisit($data, $dProjectVisit);

        return response()->json([
            'message' => __('responses.visit.validation.'.$data['state'].'.action'),
            'data' => new DProjectVisitResource($dProjectVisit),
        ], 200);
    }

    public function updateState(
        UpdateVisitStateRequest $request,
        DProjectVisit $dProjectVisit
    ): JsonResponse {
        $state = $request->validated()['state'];
        $this->dProjectVisitService->updateVisit($state, $dProjectVisit);

        return response()->json([
            'message' => __('responses.visit.validation.'
            .$state.'.action'),
            'data' => new DProjectVisitResource($dProjectVisit),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectVisit $dProjectVisit, Request $request): JsonResponse
    {
        $this->dProjectVisitService->delete($dProjectVisit);

        return response()->json(['message' => __('responses.visit.delete')], 202);
    }

    public function getVisitors()
    {
        return response()->json($this->dProjectVisitService->getVisitors());
    }

    public function getInspectorList(Request $request)
    {
        $inspectorVists = $this->dProjectVisitService->inspectorList();

        return response()->json(
            new DProjectVisitCollection($inspectorVists)
        );
    }

    public function finishVisit(DProjectVisit $dProjectVisit){
        $this->dProjectVisitService->finishVisit($dProjectVisit);
        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }
}
