<?php

namespace App\Http\Controllers;

use App\Http\Requests\DScenarioRequests\DScenarioStoreRequest;
use App\Http\Requests\DScenarioRequests\DScenarioUpdateRequest;
use App\Http\Resources\DScenarioResources\DScenarioCollection;
use App\Http\Resources\DScenarioResources\DScenarioResource;
use App\Models\DScenario;
use App\Services\DScenarioServices\DScenarioService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DScenarioController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'scenario non trouvé.';

    public function __construct(private DScenarioService $dScenarioService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dScenarios = $this->dScenarioService->getAll($request->all());

        return response()->json(
            new DScenarioCollection($dScenarios)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DScenarioStoreRequest $request): JsonResponse
    {
        $dScenario = $this->dScenarioService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.scenario.create'),
                'data' => new DScenarioResource($dScenario),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DScenario $dScenario): JsonResponse
    {
        return response()->json(new DScenarioResource($dScenario));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DScenarioUpdateRequest $request, DScenario $dScenario): JsonResponse
    {
        $this->dScenarioService->edit($request->validated(), $dScenario);

        return response()->json([
            'message' => __('responses.scenario.update'),
            'data' => new DScenarioResource($dScenario),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DScenario $dScenario, Request $request): JsonResponse
    {
        $this->dScenarioService->delete($dScenario);

        return response()->json(['message' => __('responses.scenario.update'), 202]);
    }

    public function disableScenario(DScenario $dScenario)
    {
        $this->dScenarioService->disableScenario($dScenario);

        return response()->json([
            'message' => __('responses.scenario.disabled'),
        ], 202);
    }

    public function validateScenario(DScenario $dScenario)
    {
        $this->dScenarioService->validateArticle($dScenario);

        return response()->json(['message' => __('actions.success')], 201);
    }
}
