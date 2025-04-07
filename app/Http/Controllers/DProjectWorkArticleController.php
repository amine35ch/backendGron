<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectWorkArticleRequests\DProjectWorkArticleStoreRequest;
use App\Http\Requests\DProjectWorkArticleRequests\DProjectWorkArticleUpdateRequest;
use App\Http\Resources\DProjectWorkArticleResources\DProjectWorkArticleCollection;
use App\Http\Resources\DProjectWorkArticleResources\DProjectWorkArticleResource;
use App\Models\DProjectWorkArticle;
use App\Services\DProjectWorkArticleServices\DProjectWorkArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectWorkArticleController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-work-article non trouvé.';

    public function __construct(private DProjectWorkArticleService $dProjectWorkArticleService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectWorkArticles = $this->dProjectWorkArticleService->getAll($request->all());

        return response()->json(
            new DProjectWorkArticleCollection($dProjectWorkArticles)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectWorkArticleStoreRequest $request): JsonResponse
    {
        $dProjectWorkArticle = $this->dProjectWorkArticleService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.project-work-article.create'),
                'data' => new DProjectWorkArticleResource($dProjectWorkArticle),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectWorkArticle $dProjectWorkArticle): JsonResponse
    {

        return response()->json(new DProjectWorkArticleResource($dProjectWorkArticle));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectWorkArticleUpdateRequest $request, DProjectWorkArticle $dProjectWorkArticle): JsonResponse
    {

        $this->dProjectWorkArticleService->edit($request->validated(), $dProjectWorkArticle);

        return response()->json([
            'message' => __('responses.project-work-article.update'),
            'data' => new DProjectWorkArticleResource($dProjectWorkArticle),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectWorkArticle $dProjectWorkArticle, Request $request): JsonResponse
    {

        $this->dProjectWorkArticleService->delete($dProjectWorkArticle);

        return response()->json(['message' => __('responses.project-work-article.update'), 202]);
    }
}
