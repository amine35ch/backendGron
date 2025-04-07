<?php

namespace App\Http\Controllers;

use App\Http\Requests\PArticleTypeRequests\PArticleTypeStoreRequest;
use App\Http\Requests\PArticleTypeRequests\PArticleTypeUpdateRequest;
use App\Http\Resources\PArticleTypeResources\PArticleTypeCollection;
use App\Http\Resources\PArticleTypeResources\PArticleTypeResource;
use App\Models\PArticleType;
use App\Services\PArticleTypeServices\PArticleTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PArticleTypeController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'article-type non trouvé.';

    public function __construct(private PArticleTypeService $pArticleTypeService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pArticleTypes = $this->pArticleTypeService->getAll($request->all());

        return response()->json(
            new PArticleTypeCollection($pArticleTypes)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PArticleTypeStoreRequest $request): JsonResponse
    {
        $pArticleType = $this->pArticleTypeService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'article-type a été créer avec succès.',
                'data' => new PArticleTypeResource($pArticleType),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PArticleType $pArticleType): JsonResponse
    {

        return response()->json(new PArticleTypeResource($pArticleType));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PArticleTypeUpdateRequest $request, PArticleType $pArticleType): JsonResponse
    {

        $this->pArticleTypeService->edit($request->validated(), $pArticleType);

        return response()->json([
            'message' => 'Le article-type est modifié avec succée.',
            'data' => new PArticleTypeResource($pArticleType),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PArticleType $pArticleType, Request $request): JsonResponse
    {

        $this->pArticleTypeService->delete($pArticleType);

        return response()->json(['message' => 'article-type est supprimé avec succée.'], 202);
    }
}
