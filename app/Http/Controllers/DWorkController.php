<?php

namespace App\Http\Controllers;

use App\Http\Requests\DWorkRequests\DWorkStoreRequest;
use App\Http\Requests\DWorkRequests\DWorkUpdateRequest;
use App\Http\Resources\DWorkResources\DWorkCollection;
use App\Http\Resources\DWorkResources\DWorkResource;
use App\Models\DWork;
use App\Services\DWorkServices\DWorkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DWorkController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'work non trouvé.';

    public function __construct(private DWorkService $dWorkService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dWorks = $this->dWorkService->getAll($request->all());

        return response()->json(
            new DWorkCollection($dWorks)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DWorkStoreRequest $request): JsonResponse
    {
        $dWork = $this->dWorkService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.work.create'),
                'data' => new DWorkResource($dWork),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DWork $dWork): JsonResponse
    {
        return response()->json(new DWorkResource($dWork));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DWorkUpdateRequest $request, DWork $dWork): JsonResponse
    {
        $this->dWorkService->edit($request->validated(), $dWork);

        return response()->json([
            'message' => __('responses.work.update'),
            'data' => new DWorkResource($dWork),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DWork $dWork, Request $request): JsonResponse
    {
        $this->dWorkService->delete($dWork);

        return response()->json(['message' => __('actions.success'), 202]);
    }

    public function disableWork(DWork $dWork)
    {
        $this->dWorkService->disableWork($dWork);

        return response()->json([
            'message' => __('responses.work.disabled'),
        ], 202);
    }

    public function validateWork(DWork $dWork)
    {
        $this->dWorkService->validateArticle($dWork);

        return response()->json(['message' => __('actions.success')], 201);
    }
}
