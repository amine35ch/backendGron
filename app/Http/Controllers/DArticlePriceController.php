<?php

namespace App\Http\Controllers;

use App\Http\Requests\DArticlePriceRequests\DArticlePriceStoreRequest;
use App\Http\Requests\DArticlePriceRequests\DArticlePriceUpdateRequest;
use App\Http\Resources\DArticlePriceResources\DArticlePriceCollection;
use App\Http\Resources\DArticlePriceResources\DArticlePriceResource;
use App\Models\DArticlePrice;
use App\Services\DArticlePriceServices\DArticlePriceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DArticlePriceController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'article-price non trouvé.';

    public function __construct(private DArticlePriceService $dArticlePriceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dArticlePrices = $this->dArticlePriceService->getAll($request->all());

        return response()->json(
            new DArticlePriceCollection($dArticlePrices)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DArticlePriceStoreRequest $request): JsonResponse
    {
        $dArticlePrice = $this->dArticlePriceService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('actions.success'),
                'data' => new DArticlePriceResource($dArticlePrice),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DArticlePrice $dArticlePrice): JsonResponse
    {

        return response()->json(new DArticlePriceResource($dArticlePrice));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DArticlePriceUpdateRequest $request, DArticlePrice $dArticlePrice): JsonResponse
    {

        $this->dArticlePriceService->edit($request->validated(), $dArticlePrice);

        return response()->json([
            'message' => __('responses.article-price.update'),
            'data' => new DArticlePriceResource($dArticlePrice),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DArticlePrice $dArticlePrice, Request $request): JsonResponse
    {

        $this->dArticlePriceService->delete($dArticlePrice);

        return response()->json(['message' => __('responses.article-price.update'), 202]);
    }
}
