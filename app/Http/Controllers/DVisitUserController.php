<?php

namespace App\Http\Controllers;

use App\Http\Requests\DVisitUserRequests\DVisitUserStoreRequest;
use App\Http\Requests\DVisitUserRequests\DVisitUserUpdateRequest;
use App\Http\Resources\DVisitUserResources\DVisitUserCollection;
use App\Http\Resources\DVisitUserResources\DVisitUserResource;
use App\Models\DVisitUser;
use App\Services\DVisitUserServices\DVisitUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DVisitUserController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'visit-users non trouvé.';

    public function __construct(private DVisitUserService $dVisitUserService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dVisitUsers = $this->dVisitUserService->getAll($request->all());

        return response()->json(
            new DVisitUserCollection($dVisitUsers)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DVisitUserStoreRequest $request): JsonResponse
    {
        $dVisitUser = $this->dVisitUserService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'visit-users a été créer avec succès.',
                'data' => new DVisitUserResource($dVisitUser),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DVisitUser $dVisitUser): JsonResponse
    {

        return response()->json(new DVisitUserResource($dVisitUser));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DVisitUserUpdateRequest $request, DVisitUser $dVisitUser): JsonResponse
    {

        $this->dVisitUserService->edit($request->validated(), $dVisitUser);

        return response()->json([
            'message' => 'Le visit-users est modifié avec succée.',
            'data' => new DVisitUserResource($dVisitUser),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DVisitUser $dVisitUser, Request $request): JsonResponse
    {

        $this->dVisitUserService->delete($dVisitUser);

        return response()->json(['message' => 'visit-users est supprimé avec succée.'], 202);
    }
}
