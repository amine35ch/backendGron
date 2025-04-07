<?php

namespace App\Http\Controllers;

use App\Http\Requests\DNotificationRequests\DNotificationUpdateRequest;
use App\Http\Resources\DNotificationResources\DNotificationCollection;
use App\Http\Resources\DNotificationResources\DNotificationResource;
use App\Models\DNotification;
use App\Services\DNotificationServices\DNotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DNotificationController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Notification non trouvé.';

    public function __construct(private DNotificationService $dNotificationService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dNotifications = $this->dNotificationService->getAll($request->all());

        return response()->json(
            new DNotificationCollection($dNotifications)
        );
    }

    public function countAll(Request $request)
    {
        $dNotifications = $this->dNotificationService->countAll($request->all());

        return response()->json(
            count($dNotifications)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DNotification $dNotification): JsonResponse
    {

        return response()->json(new DNotificationResource($dNotification));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DNotificationUpdateRequest $request, DNotification $dNotification): JsonResponse
    {

        $this->dNotificationService->edit($request->validated(), $dNotification);

        return response()->json([
            'message' => 'Le Notification est modifié avec succée.',
            'data' => new DNotificationResource($dNotification),
        ], 200);
    }

    public function markAsRead(DNotification $dNotification)
    {

        $this->dNotificationService->markAsRead($dNotification);

        return response()->json([
            'message' => 'La notification a été marqué comme lu.',
            'data' => new DNotificationResource($dNotification),
        ], 200);
    }

    public function markAllAsRead()
    {

        $this->dNotificationService->markAllAsRead();

        return response()->json([
            'message' => 'Les notifications ont été marqués comme lus avec succès.',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DNotification $dNotification, Request $request): JsonResponse
    {

        $this->dNotificationService->delete($dNotification);

        return response()->json(['message' => 'Notification est supprimé avec succée.'], 202);
    }
}
