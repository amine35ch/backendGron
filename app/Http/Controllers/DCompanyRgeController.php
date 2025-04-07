<?php

namespace App\Http\Controllers;

use App\Models\DCompanyRge;
use App\Http\Requests\DCompanyRgeRequests\DCompanyRgeStoreRequest;
use App\Http\Requests\DCompanyRgeRequests\DCompanyRgeUpdateRequest;
use App\Http\Resources\DCompanyRgeResources\DCompanyRgeResource;
use App\Http\Resources\DCompanyRgeResources\DCompanyRgeCollection;
use App\Services\DCompanyRgeServices\DCompanyRgeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DCompanyRgeController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'CompanyRge non trouvé.';

    public function __construct(private DCompanyRgeService $dCompanyRgeService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dCompanyRges = $this->dCompanyRgeService->getAll($request->all());

        return response()->json(
            new DCompanyRgeCollection($dCompanyRges)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(DCompanyRgeStoreRequest $request): JsonResponse
    {
        $dCompanyRge= $this->dCompanyRgeService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.CompanyRge.create'),
                'data' => new DCompanyRgeResource($dCompanyRge)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(DCompanyRge $dCompanyRge): JsonResponse
    {

        return response()->json(new DCompanyRgeResource ($dCompanyRge));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(DCompanyRgeUpdateRequest $request, DCompanyRge $dCompanyRge): JsonResponse
    {

        $this->dCompanyRgeService->edit($request->validated(), $dCompanyRge);
        return response()->json([
            'message' => __('responses.CompanyRge.update'),
            'data' => new DCompanyRgeResource ($dCompanyRge)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(DCompanyRge $dCompanyRge, Request $request): JsonResponse
    {

        $this->dCompanyRgeService->delete($dCompanyRge);

        return response()->json([ 'message' => __('responses.CompanyRge.update'), 202]);
    }
}
