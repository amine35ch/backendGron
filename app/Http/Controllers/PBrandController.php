<?php

namespace App\Http\Controllers;

use App\Http\Requests\PBrandRequests\PBrandStoreRequest;
use App\Http\Requests\PBrandRequests\PBrandUpdateRequest;
use App\Http\Resources\PBrandResources\PBrandCollection;
use App\Http\Resources\PBrandResources\PBrandResource;
use App\Models\PBrand;
use App\Services\PBrandServices\PBrandService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PBrandController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'brand non trouvé.';

    public function __construct(private PBrandService $pBrandService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pBrands = $this->pBrandService->getAll($request->all());

        return response()->json(
            new PBrandCollection($pBrands)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PBrandStoreRequest $request): JsonResponse
    {
        $pBrand = $this->pBrandService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'brand a été créer avec succès.',
                'data' => new PBrandResource($pBrand),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PBrand $pBrand): JsonResponse
    {

        return response()->json(new PBrandResource($pBrand));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PBrandUpdateRequest $request, PBrand $pBrand): JsonResponse
    {

        $this->pBrandService->edit($request->validated(), $pBrand);

        return response()->json([
            'message' => 'Le brand est modifié avec succée.',
            'data' => new PBrandResource($pBrand),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PBrand $pBrand, Request $request): JsonResponse
    {

        $this->pBrandService->delete($pBrand);

        return response()->json(['message' => 'brand est supprimé avec succée.'], 202);
    }
}
