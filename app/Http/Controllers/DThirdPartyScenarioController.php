<?php

namespace App\Http\Controllers;

use App\Http\Requests\DThirdPartyScenarioRequests\DThirdPartyScenarioStoreRequest;
use App\Http\Requests\DThirdPartyScenarioRequests\DThirdPartyScenarioUpdateRequest;
use App\Http\Resources\DThirdPartyScenarioResources\DThirdPartyScenarioCollection;
use App\Http\Resources\DThirdPartyScenarioResources\DThirdPartyScenarioResource;
use App\Models\DThirdPartyScenario;
use App\Services\DThirdPartyScenarioServices\DThirdPartyScenarioService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DThirdPartyScenarioController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'installer-scenario non trouvé.';

    public function __construct(private DThirdPartyScenarioService $dThirdPartyScenarioService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dThirdPartyScenarios = $this->dThirdPartyScenarioService->getAll($request->all());

        return response()->json(
            new DThirdPartyScenarioCollection($dThirdPartyScenarios)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DThirdPartyScenarioStoreRequest $request): JsonResponse
    {
        $dThirdPartyScenario = $this->dThirdPartyScenarioService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'installer-scenario a été créer avec succès.',
                'data' => new DThirdPartyScenarioResource($dThirdPartyScenario),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DThirdPartyScenario $dThirdPartyScenario): JsonResponse
    {

        return response()->json(new DThirdPartyScenarioResource($dThirdPartyScenario));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DThirdPartyScenarioUpdateRequest $request, DThirdPartyScenario $dThirdPartyScenario): JsonResponse
    {

        $this->dThirdPartyScenarioService->edit($request->validated(), $dThirdPartyScenario);

        return response()->json(['message' => 'Le installer-scenario est modifié avec succée.',
            'data' => new DThirdPartyScenarioResource($dThirdPartyScenario),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DThirdPartyScenario $dThirdPartyScenario, Request $request): JsonResponse
    {

        $this->dThirdPartyScenarioService->delete($dThirdPartyScenario);

        return response()->json(['message' => 'installer-scenario est supprimé avec succée.'], 202);
    }
}
