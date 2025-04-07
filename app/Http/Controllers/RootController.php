<?php

namespace App\Http\Controllers;

use App\Http\Requests\RootRequests\RootStoreRequest;
use App\Http\Requests\RootRequests\RootUpdateRequest;
use App\Http\Resources\RootResources\RootCollection;
use App\Http\Resources\RootResources\RootResource;
use App\Models\Root;
use App\Services\RootServices\RootService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RootController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'root non trouvé.';

    public function __construct(private RootService $rootService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roots = $this->rootService->getAll($request->all());

        return response()->json(
            new RootCollection($roots)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RootStoreRequest $request): JsonResponse
    {
        $root = $this->rootService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.root.create'),
                'data' => new RootResource($root),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Root $root): JsonResponse
    {

        return response()->json(new RootResource($root));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RootUpdateRequest $request, Root $root): JsonResponse
    {

        $this->rootService->edit($request->validated(), $root);

        return response()->json([
            'message' => __('responses.root.update'),
            'data' => new RootResource($root),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Root $root, Request $request): JsonResponse
    {

        $this->rootService->delete($root);

        return response()->json(['message' => __('responses.root.update'), 202]);
    }
}
