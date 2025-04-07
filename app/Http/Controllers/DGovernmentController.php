<?php

namespace App\Http\Controllers;

use App\Http\Requests\DGovernmentRequests\DGovernmentStoreRequest;
use App\Http\Requests\DGovernmentRequests\DGovernmentUpdateRequest;
use App\Http\Requests\UserRequests\UserStoreRequest;
use App\Http\Resources\DGovernmentResources\DGovernmentCollection;
use App\Http\Resources\DGovernmentResources\DGovernmentResource;
use App\Http\Resources\UserResources\UserResource;
use App\Models\DGovernment;
use App\Services\DGovernmentServices\DGovernmentService;
use App\Services\UserServices\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DGovernmentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'government non trouvé.';

    public function __construct(private DGovernmentService $dGovernmentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dGovernments = $this->dGovernmentService->getAll($request->all());

        return response()->json(
            new DGovernmentCollection($dGovernments)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DGovernmentStoreRequest $request): JsonResponse
    {
        $dGovernment = $this->dGovernmentService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.government.create'),
                'data' => new DGovernmentResource($dGovernment),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DGovernment $dGovernment): JsonResponse
    {

        return response()->json(new DGovernmentResource($dGovernment));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DGovernmentUpdateRequest $request, DGovernment $dGovernment): JsonResponse
    {

        $this->dGovernmentService->edit($request->validated(), $dGovernment);

        return response()->json([
            'message' => __('responses.government.update'),
            'data' => new DGovernmentResource($dGovernment),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DGovernment $dGovernment, Request $request): JsonResponse
    {

        $this->dGovernmentService->delete($dGovernment);

        return response()->json(['message' => __('responses.government.update'), 202]);
    }

    public function createUser(
        DGovernment $dGovernment,
        UserStoreRequest $request,
        UserService $userService
    ): JsonResponse {

        $user = $userService->create($request->validated(), $dGovernment);

        return response()->json([
            'message' => 'Utilisateur est crée avec succée.',
            'data' => new UserResource($user),
        ], 200);
    }
}
