<?php

namespace App\Http\Controllers;

use App\Http\Requests\PProjectIncomeClassRequests\PProjectIncomeClassStoreRequest;
use App\Http\Requests\PProjectIncomeClassRequests\PProjectIncomeClassUpdateRequest;
use App\Http\Resources\PProjectIncomeClassResources\PProjectIncomeClassCollection;
use App\Http\Resources\PProjectIncomeClassResources\PProjectIncomeClassResource;
use App\Models\PProjectIncomeClass;
use App\Services\PProjectIncomeClassServices\PProjectIncomeClassService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PProjectIncomeClassController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'classe de revenu non trouvé.';

    public function __construct(private PProjectIncomeClassService $pProjectIncomeClassService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pProjectIncomeClasss = $this->pProjectIncomeClassService->getAll($request->all());

        return response()->json(
            new PProjectIncomeClassCollection($pProjectIncomeClasss)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PProjectIncomeClassStoreRequest $request): JsonResponse
    {
        $pProjectIncomeClass = $this->pProjectIncomeClassService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'income-class a été créer avec succès.',
                'data' => new PProjectIncomeClassResource($pProjectIncomeClass),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PProjectIncomeClass $pProjectIncomeClass): JsonResponse
    {

        return response()->json(new PProjectIncomeClassResource($pProjectIncomeClass));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PProjectIncomeClassUpdateRequest $request, PProjectIncomeClass $pProjectIncomeClass): JsonResponse
    {

        $this->pProjectIncomeClassService->edit($request->validated(), $pProjectIncomeClass);

        return response()->json([
            'message' => 'Le income-class est modifié avec succée.',
            'data' => new PProjectIncomeClassResource($pProjectIncomeClass),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PProjectIncomeClass $pProjectIncomeClass, Request $request): JsonResponse
    {

        $this->pProjectIncomeClassService->delete($pProjectIncomeClass);

        return response()->json(['message' => 'income-class est supprimé avec succée.'], 202);
    }
}
