<?php

namespace App\Http\Controllers;

use App\Http\Requests\PNotificationRequests\PNotificationStoreRequest;
use App\Http\Requests\PNotificationRequests\PNotificationUpdateRequest;
use App\Http\Resources\PNotificationResources\PNotificationCollection;
use App\Http\Resources\PNotificationResources\PNotificationResource;
use App\Models\PNotification;
use App\Services\PNotificationServices\PNotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PNotificationController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'notification non trouvé.';

    public function __construct(private PNotificationService $pNotificationService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pNotifications = $this->pNotificationService->getAll($request->all());

        return response()->json(
            new PNotificationCollection($pNotifications)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PNotificationStoreRequest $request): JsonResponse
    {
        $pNotification = $this->pNotificationService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.notification.create'),
                'data' => new PNotificationResource($pNotification),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PNotification $pNotification): JsonResponse
    {

        return response()->json(new PNotificationResource($pNotification));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PNotificationUpdateRequest $request, PNotification $pNotification): JsonResponse
    {

        $this->pNotificationService->edit($request->validated(), $pNotification);

        return response()->json([
            'message' => __('responses.notification.update'),
            'data' => new PNotificationResource($pNotification),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PNotification $pNotification, Request $request): JsonResponse
    {

        $this->pNotificationService->delete($pNotification);

        return response()->json(['message' => __('responses.notification.update'), 202]);
    }
}
