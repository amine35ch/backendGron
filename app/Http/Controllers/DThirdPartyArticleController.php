<?php

namespace App\Http\Controllers;

use App\Http\Requests\DThirdPartyArticleRequests\DThirdPartyArticleStoreRequest;
use App\Http\Requests\DThirdPartyArticleRequests\DThirdPartyArticleUpdateRequest;
use App\Http\Resources\DThirdPartyArticleResources\DThirdPartyArticleCollection;
use App\Http\Resources\DThirdPartyArticleResources\DThirdPartyArticleResource;
use App\Models\DThirdPartyArticle;
use App\Services\DThirdPartyArticleServices\DThirdPartyArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DThirdPartyArticleController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'installer-article non trouvé.';

    public function __construct(private DThirdPartyArticleService $dThirdPartyArticleService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dThirdPartyArticles = $this->dThirdPartyArticleService->getAll($request->all());

        return response()->json(
            new DThirdPartyArticleCollection($dThirdPartyArticles)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DThirdPartyArticleStoreRequest $request): JsonResponse
    {
        $dThirdPartyArticle = $this->dThirdPartyArticleService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'installer-article a été créer avec succès.',
                'data' => new DThirdPartyArticleResource($dThirdPartyArticle),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DThirdPartyArticle $dThirdPartyArticle): JsonResponse
    {

        return response()->json(new DThirdPartyArticleResource($dThirdPartyArticle));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DThirdPartyArticleUpdateRequest $request, DThirdPartyArticle $dThirdPartyArticle): JsonResponse
    {

        $this->dThirdPartyArticleService->edit($request->validated(), $dThirdPartyArticle);

        return response()->json(['message' => 'Le installer-article est modifié avec succée.',
            'data' => new DThirdPartyArticleResource($dThirdPartyArticle),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DThirdPartyArticle $dThirdPartyArticle, Request $request): JsonResponse
    {

        $this->dThirdPartyArticleService->delete($dThirdPartyArticle);

        return response()->json(['message' => 'installer-article est supprimé avec succée.'], 202);
    }
}
