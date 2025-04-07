<?php

namespace App\Http\Controllers;

use App\Enums\DArticleEnum\DArticleType;
use App\Enums\FeatureEnum\FeatureType;
use App\Http\Requests\DArticleRequests\AddPriceStoreRequest;
use App\Http\Requests\DArticleRequests\DArticleStoreRequest;
use App\Http\Requests\DArticleRequests\DArticleUpdateRequest;
use App\Http\Resources\DArticleResources\DArticleCollection;
use App\Http\Resources\DArticleResources\DArticleResource;
use App\Models\DArticle;
use App\Services\DArticleServices\DArticleService;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\SubscriptionServices\SubscriptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DArticleController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'article non trouvé.';

    public function __construct(private DArticleService $dArticleService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('type') == DArticleType::SERVICE_MAR->value) {
            $this->authorize('view mar_services');
            $dArticles = $this->dArticleService->getMarServices($request->all());
        } else {

            $this->authorize('view articles');

            $dArticles = $this->dArticleService->getAll($request->all());
        }

        return response()->json(
            new DArticleCollection($dArticles)
        );
    }

    public function getServicesMar(Request $request)
    {
        $dArticles = $this->dArticleService->getServicesMar($request->all());

        return response()->json(
            new DArticleCollection($dArticles)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DArticleStoreRequest $request): JsonResponse
    {
        $user = auth()->user();
        $feature = FeatureType::PRODUCT->value;
        if ($request->type != DArticleType::PRODUCT->value) {
            $feature = FeatureType::SERVICE->value;
        }
        $subscriptionService = new SubscriptionService();
        $subscriptionService->validateFeature($user->company_code, $feature);

        $dArticle = $this->dArticleService
            ->create($request->validated(), $user);

        return response()->json(
            [
                'message' => __('responses.article.create'),
                'data' => new DArticleResource($dArticle),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DArticle $dArticle): JsonResponse
    {
        return response()->json(new DArticleResource($dArticle));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DArticleUpdateRequest $request, DArticle $dArticle): JsonResponse
    {
        $this->dArticleService->edit($request->validated(), $dArticle);

        return response()->json([
            'message' => __('responses.article.update'),
            'data' => new DArticleResource($dArticle),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DArticle $dArticle, Request $request): JsonResponse
    {
        $this->dArticleService->delete($dArticle);

        return response()->json(['message' => __('responses.article.delete'), 202]);
    }

    public function disableArticle(DArticle $dArticle)
    {
        $this->dArticleService->disableArticle($dArticle);

        return response()->json([
            'message' => __('responses.article.disabled'),
        ], 202);
    }

    public function enableArticle(DArticle $dArticle)
    {
        if (!$dArticle->is_validated) {
            return response()->json([
                'message' => 'Veuillez valider l\'article',
            ], 404);
        }
        $this->dArticleService->enableArticle($dArticle);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function download(DArticle $dArticle)
    {
        if (!$dArticle->path) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }
        [
            $contents,
            $headers
        ] = (new DDocumentService())->downloadDocument(
            $dArticle->path,
            'inline',
            $dArticle->name
        );

        if (!$contents) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response($contents, 200, $headers);
    }

    public function addPrice(DArticle $dArticle, AddPriceStoreRequest $request)
    {
        $this->dArticleService->addPrice($dArticle, $request->validated());

        return response()->json(['message' => __('actions.success')], 201);
    }

    public function validateArticle(DArticle $dArticle)
    {
        $this->dArticleService->validateArticle($dArticle);

        return response()->json(['message' => __('actions.success')], 201);
    }

    public function toggleAccess(DArticle $dArticle)
    {
        $this->dArticleService->updateAccess($dArticle);

        return response()->json(['message' => __('actions.success')], 201);
    }

    public function enableBrand(DArticle $dArticle)
    {
        $dArticle->brand->access = 1;
        $dArticle->brand->update();

        return response()->json(['message' => __('actions.success')], 201);
    }
}
