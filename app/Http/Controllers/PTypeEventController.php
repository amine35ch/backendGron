<?php

namespace App\Http\Controllers;

use App\Http\Requests\PTypeEventRequests\PTypeEventStoreRequest;
use App\Http\Requests\PTypeEventRequests\PTypeEventUpdateRequest;
use App\Http\Resources\PTypeEventResources\PTypeEventCollection;
use App\Http\Resources\PTypeEventResources\PTypeEventResource;
use App\Models\PTypeEvent;
use App\Services\PTypeEventServices\PTypeEventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PTypeEventController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'type-event non trouvé.';

    public function __construct(private PTypeEventService $pTypeEventService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pTypeEvents = $this->pTypeEventService->getAll($request->all());

        return response()->json(
            new PTypeEventCollection($pTypeEvents)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PTypeEventStoreRequest $request): JsonResponse
    {
        $pTypeEvent = $this->pTypeEventService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.type-event.create'),
                'data' => new PTypeEventResource($pTypeEvent),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PTypeEvent $pTypeEvent): JsonResponse
    {

        return response()->json(new PTypeEventResource($pTypeEvent));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PTypeEventUpdateRequest $request, PTypeEvent $pTypeEvent): JsonResponse
    {

        $this->pTypeEventService->edit($request->validated(), $pTypeEvent);

        return response()->json([
            'message' => __('responses.type-event.update'),
            'data' => new PTypeEventResource($pTypeEvent),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PTypeEvent $pTypeEvent, Request $request): JsonResponse
    {

        $this->pTypeEventService->delete($pTypeEvent);

        return response()->json(['message' => __('responses.type-event.update'), 202]);
    }
}
