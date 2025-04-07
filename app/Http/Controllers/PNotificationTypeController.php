<?php

namespace App\Http\Controllers;

use App\Models\PNotificationType;
use App\Http\Requests\PNotificationTypeRequests\PNotificationTypeStoreRequest;
use App\Http\Requests\PNotificationTypeRequests\PNotificationTypeUpdateRequest;
use App\Http\Resources\PNotificationTypeResources\PNotificationTypeResource;
use App\Http\Resources\PNotificationTypeResources\PNotificationTypeCollection;
use App\Services\PNotificationTypeServices\PNotificationTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PNotificationTypeController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Notification Type non trouvé.';

    public function __construct(private PNotificationTypeService $pNotificationTypeService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', PNotificationType::class);
        $pNotificationTypes = $this->pNotificationTypeService->getAll($request->all());

        return response()->json(
            new PNotificationTypeCollection($pNotificationTypes)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(PNotificationTypeStoreRequest $request): JsonResponse
    {
        $pNotificationType= $this->pNotificationTypeService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.Notification Type.create'),
                'data' => new PNotificationTypeResource($pNotificationType)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(PNotificationType $pNotificationType): JsonResponse
    {
        $this->authorize('view', $pNotificationType);
        return response()->json(new PNotificationTypeResource ($pNotificationType));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(PNotificationTypeUpdateRequest $request, PNotificationType $pNotificationType): JsonResponse
    {

        $this->pNotificationTypeService->edit($request->validated(), $pNotificationType);
        return response()->json([
            'message' => __('responses.Notification Type.update'),
            'data' => new PNotificationTypeResource ($pNotificationType)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(PNotificationType $pNotificationType, Request $request): JsonResponse
    {
        $this->authorize('delete', $pNotificationType);
        $this->pNotificationTypeService->delete($pNotificationType);

        return response()->json([ 'message' => __('responses.Notification Type.update'), 202]);
    }
}
