<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequests\PermissionSyncRequest;
use App\Http\Requests\PPermissionRequests\PPermissionStoreRequest;
use App\Http\Requests\PPermissionRequests\PPermissionUpdateRequest;
use App\Http\Resources\PPermissionResources\PPermissionCollection;
use App\Http\Resources\PPermissionResources\PPermissionResource;
use App\Models\PPermission;
use App\Services\PPermissionServices\PPermissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PPermissionController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Permission non trouvé.';

    public function __construct(private PPermissionService $pPermissionService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pPermissions = $this->pPermissionService->getAll($request->all());

        return response()->json(
            new PPermissionCollection($pPermissions)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PPermissionStoreRequest $request): JsonResponse
    {
        $pPermission = $this->pPermissionService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'Permission a été créer avec succès.',
                'data' => new PPermissionResource($pPermission),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PPermission $pPermission): JsonResponse
    {

        return response()->json(new PPermissionResource($pPermission));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PPermissionUpdateRequest $request, PPermission $pPermission): JsonResponse
    {

        $this->pPermissionService->edit($request->validated(), $pPermission);

        return response()->json([
            'message' => 'Le Permission est modifié avec succée.',
            'data' => new PPermissionResource($pPermission),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PPermission $pPermission, Request $request): JsonResponse
    {

        $this->pPermissionService->delete($pPermission);

        return response()->json(['message' => 'Permission est supprimé avec succée.'], 202);
    }

    public function fetchByRole(string $role, int $id)
    {
        $user = getUser($role, $id);
        if (! $user) {
            return response()->json(
                ['message' => __("responses.$role.not_found")],
                404
            );
        }

        return $this->pPermissionService->getPermissions($user);
    }

    public function sync(PermissionSyncRequest $request, string $role, int $id)
    {
        $this->pPermissionService->sync(
            $request->all(),
            getUser($role, $id)
        );

        return response()->json(['message' => 'Autorisations utilisateur synchronisées avec succès']);
    }
}
