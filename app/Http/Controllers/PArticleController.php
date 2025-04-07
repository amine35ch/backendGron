<?php

namespace App\Http\Controllers;

use App\Http\Requests\PArticleRequests\PArticleStoreRequest;
use App\Http\Requests\PArticleRequests\PArticleUpdateRequest;
use App\Http\Resources\PArticleResources\PArticleCollection;
use App\Http\Resources\PArticleResources\PArticleResource;
use App\Models\PArticle;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\PArticleServices\PArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PArticleController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'article non trouvé.';

    public function __construct(private PArticleService $pArticleService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pArticles = $this->pArticleService->getAll($request->all());

        return response()->json(
            new PArticleCollection($pArticles)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PArticleStoreRequest $request): JsonResponse
    {
        $pArticle = $this->pArticleService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'article a été créer avec succès.',
                'data' => new PArticleResource($pArticle),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PArticle $pArticle): JsonResponse
    {

        return response()->json(new PArticleResource($pArticle));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PArticleUpdateRequest $request, PArticle $pArticle): JsonResponse
    {

        $this->pArticleService->edit($request->validated(), $pArticle);

        return response()->json([
            'message' => 'Le article est modifié avec succée.',
            'data' => new PArticleResource($pArticle),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PArticle $pArticle, Request $request): JsonResponse
    {

        $this->pArticleService->delete($pArticle);

        return response()->json(['message' => 'article est supprimé avec succée.'], 202);
    }

    public function download(PArticle $pArticle)
    {
        if (! $pArticle->path) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }
        [
            $contents,
            $headers
        ] = (new DDocumentService())->downloadDocument(
            $pArticle->path,
            'inline',
            $pArticle->name
        );

        if (! $contents) {
            return view(
                'exceptions.file_not_found',
                ['data' => 'Aucun document trouvé.']
            );
        }

        return response($contents, 200, $headers);
    }
}
