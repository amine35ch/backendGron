<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamUserRequests\TeamUserStoreRequest;
use App\Http\Requests\TeamUserRequests\TeamUserUpdateRequest;
use App\Http\Resources\TeamUserResources\TeamUserCollection;
use App\Http\Resources\TeamUserResources\TeamUserResource;
use App\Models\TeamUser;
use App\Services\TeamUserServices\TeamUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'team-users non trouvé.';

    public function __construct(private TeamUserService $teamUserService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teamUsers = $this->teamUserService->getAll($request->all());

        return response()->json(
            new TeamUserCollection($teamUsers)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamUserStoreRequest $request): JsonResponse
    {
        $teamUser = $this->teamUserService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.team-users.create'),
                'data' => new TeamUserResource($teamUser),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamUser $teamUser): JsonResponse
    {

        return response()->json(new TeamUserResource($teamUser));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamUserUpdateRequest $request, TeamUser $teamUser): JsonResponse
    {

        $this->teamUserService->edit($request->validated(), $teamUser);

        return response()->json([
            'message' => __('responses.team-users.update'),
            'data' => new TeamUserResource($teamUser),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamUser $teamUser, Request $request): JsonResponse
    {

        $this->teamUserService->delete($teamUser);

        return response()->json(['message' => __('responses.team-users.update'), 202]);
    }
}
