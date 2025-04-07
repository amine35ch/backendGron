<?php

namespace App\Http\Controllers;

use App\Http\Requests\PScenarioRequests\OperationScenarioRequest;
use App\Http\Requests\PScenarioRequests\PScenarioStoreRequest;
use App\Http\Requests\PScenarioRequests\PScenarioUpdateRequest;
use App\Http\Resources\PScenarioResources\PScenarioCollection;
use App\Http\Resources\PScenarioResources\PScenarioResource;
use App\Models\PScenario;
use App\Services\PScenarioServices\PScenarioService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PScenarioController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'sceanrio non trouvé.';

    public function __construct(private PScenarioService $PScenarioService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $PScenarios = $this->PScenarioService->getAll($request->all());

        return response()->json(
            new PScenarioCollection($PScenarios)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PScenarioStoreRequest $request): JsonResponse
    {
        $PScenario = $this->PScenarioService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'Sceanrio a été créer avec succès.',
                'data' => new PScenarioResource($PScenario),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PScenario $PScenario): JsonResponse
    {

        return response()->json(new PScenarioResource($PScenario));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PScenarioUpdateRequest $request, PScenario $PScenario): JsonResponse
    {

        $this->PScenarioService->edit($request->validated(), $PScenario);

        return response()->json([
            'message' => 'Sceanrio est modifié avec succée.',
            'data' => new PScenarioResource($PScenario),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PScenario $PScenario, Request $request): JsonResponse
    {

        $this->PScenarioService->delete($PScenario);

        return response()->json(['message' => 'Sceanrio est supprimé avec succée.'], 202);
    }

    // public function addOperationsToSceanrio(PScenario $PScenario, OperationScenarioRequest $request): JsonResponse
    // {

    //     $this->PScenarioService->attachOperations($request['operations'],$PScenario);

    //     return response()->json(['message' => 'Sceanrio est supprimé avec succée.'], 202);
    // }

    public function disableScenario(Request $request, PScenario $pOperation)
    {
        $this->PScenarioService->disableScenario($pOperation);

        return response()->json([
            'message' => __('responses.scenario.disabled'),
        ], 202);
    }
}
