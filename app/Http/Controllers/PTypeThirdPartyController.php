<?php

namespace App\Http\Controllers;

use App\Http\Requests\PTypeThirdPartyRequests\PTypeThirdPartyStoreRequest;
use App\Http\Requests\PTypeThirdPartyRequests\PTypeThirdPartyUpdateRequest;
use App\Http\Resources\PTypeThirdPartyResources\PTypeThirdPartyCollection;
use App\Http\Resources\PTypeThirdPartyResources\PTypeThirdPartyResource;
use App\Models\PTypeThirdParty;
use App\Services\PTypeThirdPartyServices\PTypeThirdPartyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PTypeThirdPartyController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'type-installer non trouvé.';

    public function __construct(private PTypeThirdPartyService $pTypeThirdPartyService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pTypeThirdPartys = $this->pTypeThirdPartyService->getAll($request->all());

        return response()->json(
            new PTypeThirdPartyCollection($pTypeThirdPartys)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PTypeThirdPartyStoreRequest $request): JsonResponse
    {
        $pTypeThirdParty = $this->pTypeThirdPartyService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'type-installer a été créer avec succès.',
                'data' => new PTypeThirdPartyResource($pTypeThirdParty),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PTypeThirdParty $pTypeThirdParty): JsonResponse
    {

        return response()->json(new PTypeThirdPartyResource($pTypeThirdParty));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PTypeThirdPartyUpdateRequest $request, PTypeThirdParty $pTypeThirdParty): JsonResponse
    {

        $this->pTypeThirdPartyService->edit($request->validated(), $pTypeThirdParty);

        return response()->json(['message' => 'Le type-installer est modifié avec succée.',
            'data' => new PTypeThirdPartyResource($pTypeThirdParty),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PTypeThirdParty $pTypeThirdParty, Request $request): JsonResponse
    {

        $this->pTypeThirdPartyService->delete($pTypeThirdParty);

        return response()->json(['message' => 'type-installer est supprimé avec succée.'], 202);
    }
}
