<?php

namespace App\Http\Controllers;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\FeatureEnum\FeatureType;
use App\Http\Requests\DBrandRequests\DBrandStoreRequest;
use App\Http\Requests\DBrandRequests\DBrandUpdateRequest;
use App\Http\Resources\DBrandResources\DBrandCollection;
use App\Http\Resources\DBrandResources\DBrandResource;
use App\Models\DBrand;
use App\Services\DBrandServices\DBrandService;
use App\Services\SubscriptionServices\SubscriptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DBrandController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'brand non trouvé.';

    public function __construct(private DBrandService $dBrandService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dBrands = $this->dBrandService->getAll($request->all());

        return response()->json(
            new DBrandCollection($dBrands)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DBrandStoreRequest $request): JsonResponse
    {
        $subscriptionService=new SubscriptionService();
        $user=auth()->user();
        $subscriptionService->validateFeature($user->company_code,FeatureType::BRAND->value);
        $dBrand = $this->dBrandService
            ->create($request->validated(),$user);

        return response()->json(
            [
                'message' => __('responses.brand.create'),
                'data' => new DBrandResource($dBrand),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DBrand $dBrand): JsonResponse
    {

        return response()->json(new DBrandResource($dBrand));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DBrandUpdateRequest $request, DBrand $dBrand): JsonResponse
    {

        $this->dBrandService->edit($request->validated(), $dBrand);

        return response()->json([
            'message' => __('responses.brand.update'),
            'data' => new DBrandResource($dBrand),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DBrand $dBrand, Request $request): JsonResponse
    {

        $this->dBrandService->delete($dBrand);

        return response()->json(['message' => __('responses.brand.delete'), 202]);
    }

    public function disableBrand(DBrand $dBrand)
    {
        $this->dBrandService->disableBrand($dBrand);

        return response()->json([
            'message' => __('responses.brand.disabled'),
        ], 202);
    }

    public function enableBrand(DBrand $dBrand)
    {
        $user=auth()->user();
        if (! $dBrand->is_validated) {
            if ($user->profile !== DCompanyProfile::MAR->value) {
                return response()->json([
                    'message' => 'Attendez que le MAR valide la marque.',
                ], 404);
            }
          else {
            return response()->json([
                'message' => 'Veuillez valider la marque',
            ], 404);
          }
        }
        $this->dBrandService->enableBrand($dBrand);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }

    public function validateBrand(DBrand $dBrand)
    {
        $this->dBrandService->validateBrand($dBrand);

        return response()->json(['message' => __('actions.success')], 201);
    }

    public function toggleAccess(DBrand $dBrand)
    {
        $this->dBrandService->updateAccess($dBrand);

        return response()->json(['message' => __('actions.success')], 201);
    }
}
