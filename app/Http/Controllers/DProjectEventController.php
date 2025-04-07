<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectEventRequests\DProjectEventStoreRequest;
use App\Http\Requests\DProjectEventRequests\DProjectEventUpdateRequest;
use App\Http\Resources\DProjectEventResources\DProjectEventCollection;
use App\Http\Resources\DProjectEventResources\DProjectEventResource;
use App\Models\DProjectEvent;
use App\Services\DProjectEventServices\DProjectEventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectEventController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'visit non trouvé.';

    public function __construct(private DProjectEventService $dProjectEventService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectEvents = $this->dProjectEventService->getAll($request->all());

        return response()->json(
            new DProjectEventCollection($dProjectEvents)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectEventStoreRequest $request): JsonResponse
    {
        $dProjectEvent = $this->dProjectEventService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.visit.create'),
                'data' => new DProjectEventResource($dProjectEvent),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectEvent $dProjectEvent): JsonResponse
    {

        return response()->json(new DProjectEventResource($dProjectEvent));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectEventUpdateRequest $request, DProjectEvent $dProjectEvent): JsonResponse
    {

        $this->dProjectEventService->edit($request->validated(), $dProjectEvent);

        return response()->json([
            'message' => __('responses.visit.update'),
            'data' => new DProjectEventResource($dProjectEvent),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectEvent $dProjectEvent, Request $request): JsonResponse
    {

        $this->dProjectEventService->delete($dProjectEvent);

        return response()->json(['message' => __('responses.visit.update'), 202]);
    }
}
