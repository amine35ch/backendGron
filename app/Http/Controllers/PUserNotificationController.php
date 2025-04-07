<?php

namespace App\Http\Controllers;

use App\Http\Requests\PUserNotificationRequests\PUserNotificationStoreRequest;
use App\Http\Requests\PUserNotificationRequests\PUserNotificationUpdateRequest;
use App\Http\Resources\PUserNotificationResources\PUserNotificationCollection;
use App\Http\Resources\PUserNotificationResources\PUserNotificationResource;
use App\Models\PUserNotification;
use App\Services\PUserNotificationServices\PUserNotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PUserNotificationController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'user-notification non trouvé.';

    public function __construct(private PUserNotificationService $pUserNotificationService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pUserNotifications = $this->pUserNotificationService->getAll($request->all());

        return response()->json(
            new PUserNotificationCollection($pUserNotifications)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PUserNotificationStoreRequest $request): JsonResponse
    {
        $pUserNotification = $this->pUserNotificationService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.user-notification.create'),
                'data' => new PUserNotificationResource($pUserNotification),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PUserNotification $pUserNotification): JsonResponse
    {

        return response()->json(new PUserNotificationResource($pUserNotification));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PUserNotificationUpdateRequest $request, PUserNotification $pUserNotification): JsonResponse
    {

        $this->pUserNotificationService->edit($request->validated(), $pUserNotification);

        return response()->json([
            'message' => __('responses.user-notification.update'),
            'data' => new PUserNotificationResource($pUserNotification),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PUserNotification $pUserNotification, Request $request): JsonResponse
    {

        $this->pUserNotificationService->delete($pUserNotification);

        return response()->json(['message' => __('responses.user-notification.update'), 202]);
    }
}
