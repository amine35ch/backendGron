<?php

namespace App\Http\Controllers;

use App\Models\PCategory;
use App\Http\Requests\PCategoryRequests\PCategoryStoreRequest;
use App\Http\Requests\PCategoryRequests\PCategoryUpdateRequest;
use App\Http\Resources\PCategoryResources\PCategoryResource;
use App\Http\Resources\PCategoryResources\PCategoryCollection;
use App\Services\PCategoryServices\PCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PCategoryController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Category non trouvé.';

    public function __construct(private PCategoryService $pCategoryService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('viewAny', PCategory::class);
        $pCategorys = $this->pCategoryService->getAll($request->all());

        return response()->json(
            new PCategoryCollection($pCategorys)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(PCategoryStoreRequest $request): JsonResponse
    {
        $pCategory = $this->pCategoryService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.Category.create'),
                'data' => new PCategoryResource($pCategory)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(PCategory $pCategory): JsonResponse
    {
        $this->authorize('view', $pCategory);
        return response()->json(new PCategoryResource($pCategory));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(PCategoryUpdateRequest $request, PCategory $pCategory): JsonResponse
    {

        $this->pCategoryService->edit($request->validated(), $pCategory);
        return response()->json([
            'message' => __('responses.Category.update'),
            'data' => new PCategoryResource($pCategory)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(PCategory $pCategory, Request $request): JsonResponse
    {
        $this->authorize('delete', $pCategory);
        $this->pCategoryService->delete($pCategory);

        return response()->json(['message' => __('responses.Category.update'), 202]);
    }
}
