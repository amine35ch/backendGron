<?php

namespace App\Http\Controllers;

use App\Http\Requests\DThirdPartyBrandRequests\DThirdPartyBrandStoreRequest;
use App\Http\Requests\DThirdPartyBrandRequests\DThirdPartyBrandUpdateRequest;
use App\Http\Resources\DThirdPartyBrandResources\DThirdPartyBrandCollection;
use App\Http\Resources\DThirdPartyBrandResources\DThirdPartyBrandResource;
use App\Models\DThirdPartyBrand;
use App\Services\DThirdPartyBrandServices\DThirdPartyBrandService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DThirdPartyBrandController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'installer-brand non trouvé.';

    public function __construct(private DThirdPartyBrandService $dThirdPartyBrandService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dThirdPartyBrands = $this->dThirdPartyBrandService->getAll($request->all());

        return response()->json(
            new DThirdPartyBrandCollection($dThirdPartyBrands)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DThirdPartyBrandStoreRequest $request): JsonResponse
    {
        $dThirdPartyBrand = $this->dThirdPartyBrandService
            ->create($request->validated());

        return response()->json(
            [
                'message' => 'installer-brand a été créer avec succès.',
                'data' => new DThirdPartyBrandResource($dThirdPartyBrand),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DThirdPartyBrand $dThirdPartyBrand): JsonResponse
    {

        return response()->json(new DThirdPartyBrandResource($dThirdPartyBrand));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DThirdPartyBrandUpdateRequest $request, DThirdPartyBrand $dThirdPartyBrand): JsonResponse
    {

        $this->dThirdPartyBrandService->edit($request->validated(), $dThirdPartyBrand);

        return response()->json(['message' => 'Le installer-brand est modifié avec succée.',
            'data' => new DThirdPartyBrandResource($dThirdPartyBrand),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DThirdPartyBrand $dThirdPartyBrand, Request $request): JsonResponse
    {

        $this->dThirdPartyBrandService->delete($dThirdPartyBrand);

        return response()->json(['message' => 'installer-brand est supprimé avec succée.'], 202);
    }
}
