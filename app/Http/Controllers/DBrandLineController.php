<?php

namespace App\Http\Controllers;

use App\Http\Requests\DBrandLineRequests\DBrandLineStoreRequest;
use App\Http\Requests\DBrandLineRequests\DBrandLineUpdateRequest;
use App\Http\Resources\DBrandLineResources\DBrandLineCollection;
use App\Http\Resources\DBrandLineResources\DBrandLineResource;
use App\Models\DBrandLine;
use App\Services\DBrandLineServices\DBrandLineService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DBrandLineController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'brand-line non trouvé.';

    public function __construct(private DBrandLineService $dBrandLineService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dBrandLines = $this->dBrandLineService->getAll($request->all());

        return response()->json(
            new DBrandLineCollection($dBrandLines)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DBrandLineStoreRequest $request): JsonResponse
    {
        $dBrandLine = $this->dBrandLineService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.brand-line.create'),
                'data' => new DBrandLineResource($dBrandLine),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DBrandLine $dBrandLine): JsonResponse
    {

        return response()->json(new DBrandLineResource($dBrandLine));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DBrandLineUpdateRequest $request, DBrandLine $dBrandLine): JsonResponse
    {

        $this->dBrandLineService->edit($request->validated(), $dBrandLine);

        return response()->json([
            'message' => __('responses.brand-line.update'),
            'data' => new DBrandLineResource($dBrandLine),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DBrandLine $dBrandLine, Request $request): JsonResponse
    {

        $this->dBrandLineService->delete($dBrandLine);

        return response()->json(['message' => __('responses.brand-line.update'), 202]);
    }
}
