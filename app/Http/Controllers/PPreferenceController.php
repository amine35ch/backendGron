<?php

namespace App\Http\Controllers;

use App\Models\PPreference;
use App\Http\Requests\PPreferenceRequests\PPreferenceStoreRequest;
use App\Http\Requests\PPreferenceRequests\PPreferenceUpdateRequest;
use App\Http\Resources\PPreferenceResources\PPreferenceResource;
use App\Http\Resources\PPreferenceResources\PPreferenceCollection;
use App\Services\PPreferenceServices\PPreferenceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PPreferenceController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Preference non trouvé.';

    public function __construct(private PPreferenceService $pPreferenceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pPreferences = $this->pPreferenceService->getAll($request->all());

        return response()->json(
            new PPreferenceCollection($pPreferences)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(PPreferenceStoreRequest $request): JsonResponse
    {
        $pPreference= $this->pPreferenceService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.Preference.create'),
                'data' => new PPreferenceResource($pPreference)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(PPreference $pPreference): JsonResponse
    {

        return response()->json(new PPreferenceResource ($pPreference));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(PPreferenceUpdateRequest $request, PPreference $pPreference): JsonResponse
    {

        $this->pPreferenceService->edit($request->validated(), $pPreference);
        return response()->json([
            'message' => __('responses.Preference.update'),
            'data' => new PPreferenceResource ($pPreference)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(PPreference $pPreference, Request $request): JsonResponse
    {

        $this->pPreferenceService->delete($pPreference);

        return response()->json([ 'message' => __('responses.Preference.update'), 202]);
    }
}
