<?php

namespace App\Http\Controllers;

use App\Http\Requests\DSubContractorRequests\DSubContractorStoreRequest;
use App\Http\Requests\DSubContractorRequests\DSubContractorUpdateRequest;
use App\Http\Requests\UserRequests\UserStoreRequest;
use App\Http\Resources\DSubContractorResources\DSubContractorCollection;
use App\Http\Resources\DSubContractorResources\DSubContractorResource;
use App\Http\Resources\UserResources\UserResource;
use App\Models\DSubContractor;
use App\Services\DSubContractorServices\DSubContractorService;
use App\Services\UserServices\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DSubContractorController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'sub-contractor non trouvé.';

    public function __construct(private DSubContractorService $dSubContractorService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dSubContractors = $this->dSubContractorService->getAll($request->all());

        return response()->json(
            new DSubContractorCollection($dSubContractors)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DSubContractorStoreRequest $request): JsonResponse
    {
        $dSubContractor = $this->dSubContractorService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.sub-contractor.create'),
                'data' => new DSubContractorResource($dSubContractor),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DSubContractor $dSubContractor): JsonResponse
    {

        return response()->json(new DSubContractorResource($dSubContractor));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DSubContractorUpdateRequest $request, DSubContractor $dSubContractor): JsonResponse
    {

        $this->dSubContractorService->edit($request->validated(), $dSubContractor);

        return response()->json([
            'message' => __('responses.sub-contractor.update'),
            'data' => new DSubContractorResource($dSubContractor),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DSubContractor $dSubContractor, Request $request): JsonResponse
    {

        $this->dSubContractorService->delete($dSubContractor);

        return response()->json(['message' => __('responses.sub-contractor.delete'), 202]);
    }

    public function createUser(
        DSubContractor $dSubContractor,
        UserStoreRequest $request,
        UserService $userService
    ): JsonResponse {

        $user = $userService->create($request->validated(), $dSubContractor);

        return response()->json([
            'message' => 'Utilisateur est crée avec succée.',
            'data' => new UserResource($user),
        ], 200);
    }
}
