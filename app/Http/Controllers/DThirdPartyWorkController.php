<?php

namespace App\Http\Controllers;

use App\Http\Requests\DThirdPartyWorkRequests\DThirdPartyWorkStoreRequest;
use App\Http\Requests\DThirdPartyWorkRequests\DThirdPartyWorkUpdateRequest;
use App\Http\Resources\DThirdPartyWorkResources\DThirdPartyWorkCollection;
use App\Http\Resources\DThirdPartyWorkResources\DThirdPartyWorkResource;
use App\Models\DThirdPartyWork;
use App\Services\DThirdPartyWorkServices\DThirdPartyWorkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DThirdPartyWorkController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'installer-work non trouvé.';

    public function __construct(private DThirdPartyWorkService $dThirdPartyWorkService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dThirdPartyWorks = $this->dThirdPartyWorkService->getAll($request->all());

        return response()->json(
            new DThirdPartyWorkCollection($dThirdPartyWorks)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DThirdPartyWorkStoreRequest $request): JsonResponse
    {
        $dThirdPartyWork = $this->dThirdPartyWorkService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'installer-work a été créer avec succès.',
                'data' => new DThirdPartyWorkResource($dThirdPartyWork),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DThirdPartyWork $dThirdPartyWork): JsonResponse
    {

        return response()->json(new DThirdPartyWorkResource($dThirdPartyWork));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DThirdPartyWorkUpdateRequest $request, DThirdPartyWork $dThirdPartyWork): JsonResponse
    {

        $this->dThirdPartyWorkService->edit($request->validated(), $dThirdPartyWork);

        return response()->json(['message' => 'Le installer-work est modifié avec succée.',
            'data' => new DThirdPartyWorkResource($dThirdPartyWork),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DThirdPartyWork $dThirdPartyWork, Request $request): JsonResponse
    {

        $this->dThirdPartyWorkService->delete($dThirdPartyWork);

        return response()->json(['message' => 'installer-work est supprimé avec succée.'], 202);
    }
}
