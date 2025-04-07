<?php

namespace App\Http\Controllers;

use App\Http\Requests\PRoleRequests\PRoleStoreRequest;
use App\Http\Requests\PRoleRequests\PRoleUpdateRequest;
use App\Http\Resources\PRoleResources\PRoleCollection;
use App\Http\Resources\PRoleResources\PRoleResource;
use App\Models\PRole;
use App\Services\PRoleServices\PRoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PRoleController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Role non trouvé.';

    public function __construct(private PRoleService $pRoleService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pRoles = $this->pRoleService->getAll($request->all());

        return response()->json(
            new PRoleCollection($pRoles)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PRoleStoreRequest $request): JsonResponse
    {
        $pRole = $this->pRoleService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'Role a été créer avec succès.',
                'data' => new PRoleResource($pRole),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PRole $pRole): JsonResponse
    {

        return response()->json(new PRoleResource($pRole));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PRoleUpdateRequest $request, PRole $pRole): JsonResponse
    {

        $this->pRoleService->edit($request->validated(), $pRole);

        return response()->json([
            'message' => 'Le Role est modifié avec succée.',
            'data' => new PRoleResource($pRole),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PRole $pRole, Request $request): JsonResponse
    {

        $this->pRoleService->delete($pRole);

        return response()->json(['message' => 'Role est supprimé avec succée.'], 202);
    }
}
