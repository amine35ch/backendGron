<?php

namespace App\Http\Controllers;

use App\Http\Requests\PProfileRequests\PProfileStoreRequest;
use App\Http\Requests\PProfileRequests\PProfileUpdateRequest;
use App\Http\Resources\PProfileResources\PProfileCollection;
use App\Http\Resources\PProfileResources\PProfileResource;
use App\Models\PProfile;
use App\Services\PProfileServices\PProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PProfileController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'profile non trouvé.';

    public function __construct(private PProfileService $pProfileService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pProfiles = $this->pProfileService->getAll($request->all());

        return response()->json(
            new PProfileCollection($pProfiles)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PProfileStoreRequest $request): JsonResponse
    {
        $pProfile = $this->pProfileService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.profile.create'),
                'data' => new PProfileResource($pProfile),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PProfile $pProfile): JsonResponse
    {

        return response()->json(new PProfileResource($pProfile));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PProfileUpdateRequest $request, PProfile $pProfile): JsonResponse
    {

        $this->pProfileService->edit($request->validated(), $pProfile);

        return response()->json([
            'message' => __('responses.profile.update'),
            'data' => new PProfileResource($pProfile),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PProfile $pProfile, Request $request): JsonResponse
    {

        $this->pProfileService->delete($pProfile);

        return response()->json(['message' => __('responses.profile.update'), 202]);
    }
}
