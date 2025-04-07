<?php

namespace App\Http\Controllers;

use App\Http\Requests\PPermissionRoleRequests\PPermissionRoleStoreRequest;
use App\Http\Requests\PPermissionRoleRequests\PPermissionRoleUpdateRequest;
use App\Http\Resources\PPermissionRoleResources\PPermissionRoleCollection;
use App\Http\Resources\PPermissionRoleResources\PPermissionRoleResource;
use App\Models\PPermissionRole;
use App\Services\PPermissionRoleServices\PPermissionRoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PPermissionRoleController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'PermissionRole non trouvé.';

    public function __construct(private PPermissionRoleService $pPermissionRoleService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pPermissionRoles = $this->pPermissionRoleService->getAll($request->all());

        return response()->json(
            new PPermissionRoleCollection($pPermissionRoles)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PPermissionRoleStoreRequest $request): JsonResponse
    {
        $pPermissionRole = $this->pPermissionRoleService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'PermissionRole a été créer avec succès.',
                'data' => new PPermissionRoleResource($pPermissionRole),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PPermissionRole $pPermissionRole): JsonResponse
    {

        return response()->json(new PPermissionRoleResource($pPermissionRole));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PPermissionRoleUpdateRequest $request, PPermissionRole $pPermissionRole): JsonResponse
    {

        $this->pPermissionRoleService->edit($request->validated(), $pPermissionRole);

        return response()->json([
            'message' => 'Le PermissionRole est modifié avec succée.',
            'data' => new PPermissionRoleResource($pPermissionRole),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PPermissionRole $pPermissionRole, Request $request): JsonResponse
    {

        $this->pPermissionRoleService->delete($pPermissionRole);

        return response()->json(['message' => 'PermissionRole est supprimé avec succée.'], 202);
    }
}
