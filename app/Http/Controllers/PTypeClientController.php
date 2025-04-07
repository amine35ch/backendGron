<?php

namespace App\Http\Controllers;

use App\Http\Requests\PTypeClientRequests\PTypeClientStoreRequest;
use App\Http\Requests\PTypeClientRequests\PTypeClientUpdateRequest;
use App\Http\Resources\PTypeClientResources\PTypeClientCollection;
use App\Http\Resources\PTypeClientResources\PTypeClientResource;
use App\Models\PTypeClient;
use App\Services\PTypeClientServices\PTypeClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PTypeClientController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'type-client non trouvé.';

    public function __construct(private PTypeClientService $pTypeClientService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pTypeClients = $this->pTypeClientService->getAll($request->all());

        return response()->json(
            new PTypeClientCollection($pTypeClients)
        );
    }
    public function getPropects(Request $request)
    {
        $pTypeClients = $this->pTypeClientService->getAll($request->all());

        return response()->json(
            new PTypeClientCollection($pTypeClients)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PTypeClientStoreRequest $request): JsonResponse
    {
        $pTypeClient = $this->pTypeClientService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'type-client a été créer avec succès.',
                'data' => new PTypeClientResource($pTypeClient),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PTypeClient $pTypeClient): JsonResponse
    {

        return response()->json(new PTypeClientResource($pTypeClient));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PTypeClientUpdateRequest $request, PTypeClient $pTypeClient): JsonResponse
    {

        $this->pTypeClientService->edit($request->validated(), $pTypeClient);

        return response()->json([
            'message' => 'Le type-client est modifié avec succée.',
            'data' => new PTypeClientResource($pTypeClient),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PTypeClient $pTypeClient, Request $request): JsonResponse
    {

        $this->pTypeClientService->delete($pTypeClient);

        return response()->json(['message' => 'type-client est supprimé avec succée.'], 202);
    }
}
