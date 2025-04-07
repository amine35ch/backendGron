<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectWorkRequests\DProjectWorkStoreRequest;
use App\Http\Requests\DProjectWorkRequests\DProjectWorkUpdateRequest;
use App\Http\Resources\DProjectWorkResources\DProjectWorkCollection;
use App\Http\Resources\DProjectWorkResources\DProjectWorkResource;
use App\Models\DProjectWork;
use App\Services\DProjectWorkServices\DProjectWorkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectWorkController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'work non trouvé.';

    public function __construct(private DProjectWorkService $dProjectWorkService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectWorks = $this->dProjectWorkService->getAll($request->all());

        return response()->json(
            new DProjectWorkCollection($dProjectWorks)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectWorkStoreRequest $request): JsonResponse
    {
        $dProjectWork = $this->dProjectWorkService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.work.create'),
                'data' => new DProjectWorkResource($dProjectWork),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectWork $dProjectWork): JsonResponse
    {

        return response()->json(new DProjectWorkResource($dProjectWork));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectWorkUpdateRequest $request, DProjectWork $dProjectWork): JsonResponse
    {

        $this->dProjectWorkService->edit($request->validated(), $dProjectWork);

        return response()->json([
            'message' => __('responses.work.update'),
            'data' => new DProjectWorkResource($dProjectWork),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectWork $dProjectWork, Request $request): JsonResponse
    {

        $this->dProjectWorkService->delete($dProjectWork);

        return response()->json(['message' => __('responses.work.update'), 202]);
    }
}
