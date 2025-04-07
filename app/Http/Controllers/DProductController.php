<?php

namespace App\Http\Controllers;

use App\Models\DProduct;
use App\Http\Requests\DProductRequests\DProductStoreRequest;
use App\Http\Requests\DProductRequests\DProductUpdateRequest;
use App\Http\Resources\DProductResources\DProductResource;
use App\Http\Resources\DProductResources\DProductCollection;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DProductServices\DProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProductController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Product non trouvé.';

    public function __construct(private DProductService $dProductService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', DProduct::class);
        $dProducts = $this->dProductService->getAll($request->all());

        return response()->json(
            new DProductCollection($dProducts)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(DProductStoreRequest $request): JsonResponse
    {
        $dProduct = $this->dProductService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.article.create'),
                'data' => new DProductResource($dProduct)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show($dProductId): JsonResponse
    {
        $dProduct = $this->dProductService->getById($dProductId);

        $this->authorize('view', $dProduct);
        return response()->json(new DProductResource($dProduct));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(DProductUpdateRequest $request, $dProductId): JsonResponse
    {
        $dProduct = $this->dProductService->getById($dProductId);

        $this->authorize('update', $dProduct);

        $this->dProductService->edit($request->validated(), $dProduct);

        return response()->json([
            'message' => __('responses.article.update'),
            'data' => new DProductResource($dProduct)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(DProduct $dProduct, Request $request): JsonResponse
    {
        $this->authorize('delete', $dProduct);
        $this->dProductService->delete($dProduct);

        return response()->json(['message' => __('responses.article.update'), 202]);
    }

    public function validateProduct($dProductId)
    {
        $dProduct = $this->dProductService->getById($dProductId);

        $this->authorize('validate', $dProduct);

        $this->dProductService->validateProduct($dProduct);

        return response()->json([
            'message' => __('responses.article.disabled'),
        ], 202);
    }

    public function disableProduct($dProductId)
    {
        $dProduct = $this->dProductService->getById($dProductId);

        $this->authorize('update', $dProduct);
        $this->dProductService->disableProduct($dProduct);

        return response()->json([
            'message' => __('responses.article.disabled'),
        ], 202);
    }

    public function enableProduct($dProductId)
    {
        $dProduct = $this->dProductService->getById($dProductId);

        $this->authorize('update', $dProduct);

        if (!$dProduct->is_validated) {
            return response()->json([
                'message' => 'Veuillez valider l\'article',
            ], 404);
        }
        $this->dProductService->enableProduct($dProduct);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function toggleAccess($dProductId)
    {
        $dProduct = $this->dProductService->getById($dProductId);

        $this->authorize('updateAccess', $dProduct);

        $this->dProductService->updateAccess($dProduct);

        return response()->json(['message' => __('actions.success')], 201);
    }

    public function getFile($productId, $fileName)
    {
        $dProduct = $this->dProductService->getById($productId);
        $this->authorize('view', $dProduct);
        [
            $contents,
            $headers
        ] = (new DDocumentService())->downloadDocument(
            $dProduct->$fileName,
            'inline',
            $dProduct->getFileName($fileName)
        );

        if (!$contents) {
            return response()->json([
                'message' => 'Aucun document trouvé.',
            ], 404);
        }

        return response($contents, 200, $headers + ['file_name' => 'kh']);
    }
}
