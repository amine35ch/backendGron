<?php

namespace App\Http\Controllers;

use App\Models\PSubCategory;
use App\Http\Requests\PSubCategoryRequests\PSubCategoryStoreRequest;
use App\Http\Requests\PSubCategoryRequests\PSubCategoryUpdateRequest;
use App\Http\Resources\PSubCategoryResources\PSubCategoryResource;
use App\Http\Resources\PSubCategoryResources\PSubCategoryCollection;
use App\Services\PSubCategoryServices\PSubCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PSubCategoryController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'SubCategory non trouvé.';

    public function __construct(private PSubCategoryService $pSubCategoryService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('viewAny', PSubCategory::class);
        $pSubCategorys = $this->pSubCategoryService->getAll($request->all());

        return response()->json(
            new PSubCategoryCollection($pSubCategorys)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(PSubCategoryStoreRequest $request): JsonResponse
    {
        $pSubCategory = $this->pSubCategoryService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.SubCategory.create'),
                'data' => new PSubCategoryResource($pSubCategory)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(PSubCategory $pSubCategory): JsonResponse
    {
        $this->authorize('view', $pSubCategory);
        return response()->json(new PSubCategoryResource($pSubCategory));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(PSubCategoryUpdateRequest $request, PSubCategory $pSubCategory): JsonResponse
    {

        $this->pSubCategoryService->edit($request->validated(), $pSubCategory);
        return response()->json([
            'message' => __('responses.SubCategory.update'),
            'data' => new PSubCategoryResource($pSubCategory)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(PSubCategory $pSubCategory, Request $request): JsonResponse
    {
        $this->authorize('delete', $pSubCategory);
        $this->pSubCategoryService->delete($pSubCategory);

        return response()->json(['message' => __('responses.SubCategory.update'), 202]);
    }
}
