<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectThirdPartyRequests\DProjectThirdPartyStoreRequest;
use App\Http\Requests\DProjectThirdPartyRequests\DProjectThirdPartyUpdateRequest;
use App\Http\Resources\DProjectThirdPartyResources\DProjectThirdPartyCollection;
use App\Http\Resources\DProjectThirdPartyResources\DProjectThirdPartyResource;
use App\Models\DProjectThirdParty;
use App\Services\DProjectThirdPartyServices\DProjectThirdPartyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectThirdPartyController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-installer non trouvé.';

    public function __construct(private DProjectThirdPartyService $dProjectThirdPartyService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectThirdPartys = $this->dProjectThirdPartyService->getAll($request->all());

        return response()->json(
            new DProjectThirdPartyCollection($dProjectThirdPartys)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectThirdPartyStoreRequest $request): JsonResponse
    {
        $dProjectThirdParty = $this->dProjectThirdPartyService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'project-installer a été créer avec succès.',
                'data' => new DProjectThirdPartyResource($dProjectThirdParty),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectThirdParty $dProjectThirdParty): JsonResponse
    {

        return response()->json(new DProjectThirdPartyResource($dProjectThirdParty));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectThirdPartyUpdateRequest $request, DProjectThirdParty $dProjectThirdParty): JsonResponse
    {

        $this->dProjectThirdPartyService->edit($request->validated(), $dProjectThirdParty);

        return response()->json(['message' => 'Le project-installer est modifié avec succée.',
            'data' => new DProjectThirdPartyResource($dProjectThirdParty),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectThirdParty $dProjectThirdParty, Request $request): JsonResponse
    {

        $this->dProjectThirdPartyService->delete($dProjectThirdParty);

        return response()->json(['message' => 'project-installer est supprimé avec succée.'], 202);
    }
}
