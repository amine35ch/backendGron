<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\DGeneralNotification;
use App\Http\Requests\DGeneralNotificationRequests\DGeneralNotificationStoreRequest;
use App\Http\Requests\DGeneralNotificationRequests\DGeneralNotificationUpdateRequest;
use App\Http\Resources\DGeneralNotificationResources\DGeneralNotificationResource;
use App\Http\Resources\DGeneralNotificationResources\DGeneralNotificationCollection;
use App\Services\DGeneralNotificationServices\DGeneralNotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DGeneralNotificationController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'general-notification non trouvé.';

    public function __construct(private DGeneralNotificationService $dGeneralNotificationService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('viewAny', DGeneralNotification::class);
        $dGeneralNotifications = $this->dGeneralNotificationService->getAll($request->all());

        return response()->json(
            new DGeneralNotificationCollection($dGeneralNotifications)
        );
    }

    public function latest()
    {
        $dGeneralNotifications = $this->dGeneralNotificationService->latest();

        return response()->json(
            ($dGeneralNotifications)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(DGeneralNotificationStoreRequest $request): JsonResponse
    {
        $dGeneralNotification= $this->dGeneralNotificationService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.general-notification.create'),
                'data' => new DGeneralNotificationResource($dGeneralNotification)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(DGeneralNotification $dGeneralNotification): JsonResponse
    {
        $this->authorize('view', $dGeneralNotification);
        return response()->json(new DGeneralNotificationResource ($dGeneralNotification));
    }


    public function seen(): JsonResponse
    {
        $dGeneralNotification = $this->dGeneralNotificationService->latest();
        unset($dGeneralNotification['display']);
        if ($dGeneralNotification) {
            $this->dGeneralNotificationService->seen($dGeneralNotification);
            return response()->json(
                [
                    'message' => __('actions.success'),
                ],
                201
            );
        }else {
           throw new CustomException('Vous avez déjà vu cette notification');
        }
      
    }
    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(DGeneralNotificationUpdateRequest $request, DGeneralNotification $dGeneralNotification): JsonResponse
    {

        $this->dGeneralNotificationService->edit($request->validated(), $dGeneralNotification);
        return response()->json([
            'message' => __('responses.general-notification.update'),
            'data' => new DGeneralNotificationResource ($dGeneralNotification)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(DGeneralNotification $dGeneralNotification, Request $request): JsonResponse
    {
        $this->authorize('delete', $dGeneralNotification);
        $this->dGeneralNotificationService->delete($dGeneralNotification);

        return response()->json([ 'message' => __('responses.general-notification.update'), 202]);
    }
}
