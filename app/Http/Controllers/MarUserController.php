<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarUserRequests\MarUserStoreRequest;
use App\Http\Requests\MarUserRequests\MarUserUpdateRequest;
use App\Http\Resources\MarUserResources\MarUserCollection;
use App\Http\Resources\MarUserResources\MarUserResource;
use App\Models\MarUser;
use App\Services\MarUserServices\MarUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MarUserController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Sociéte non trouvé.';

    public function __construct(private MarUserService $companyUserService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companyUsers = $this->marUserService->getAll($request->all());

        return response()->json(
            new MarUserCollection($companyUsers)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarUserStoreRequest $request): JsonResponse
    {
        $companyUser = $this->marUserService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'Sociéte a été créer avec succès.',
                'data' => new MarUserResource($companyUser),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(MarUser $companyUser): JsonResponse
    {

        return response()->json(new MarUserResource($companyUser));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarUserUpdateRequest $request, MarUser $companyUser): JsonResponse
    {

        $this->marUserService->edit($request->validated(), $companyUser);

        return response()->json([
            'message' => 'Le Sociéte est modifié avec succée.',
            'data' => new MarUserResource($companyUser),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MarUser $companyUser, Request $request): JsonResponse
    {

        $this->marUserService->delete($companyUser);

        return response()->json(['message' => 'Sociéte est supprimé avec succée.'], 202);
    }
}
