<?php

namespace App\Http\Controllers;

use App\Http\Requests\DCompanyChildRequests\DCompanyChildStoreRequest;
use App\Http\Requests\DCompanyChildRequests\DCompanyChildUpdateRequest;
use App\Http\Resources\DCompanyChildResources\DCompanyChildCollection;
use App\Http\Resources\DCompanyChildResources\DCompanyChildResource;
use App\Models\DCompanyChild;
use App\Services\DCompanyChildServices\DCompanyChildService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DCompanyChildController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'company-child non trouvé.';

    public function __construct(private DCompanyChildService $dCompanyChildService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dCompanyChilds = $this->dCompanyChildService->getAll($request->all());

        return response()->json(
            new DCompanyChildCollection($dCompanyChilds)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DCompanyChildStoreRequest $request): JsonResponse
    {
        $dCompanyChild = $this->dCompanyChildService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.company-child.create'),
                'data' => new DCompanyChildResource($dCompanyChild),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DCompanyChild $dCompanyChild): JsonResponse
    {

        return response()->json(new DCompanyChildResource($dCompanyChild));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DCompanyChildUpdateRequest $request, DCompanyChild $dCompanyChild): JsonResponse
    {

        $this->dCompanyChildService->edit($request->validated(), $dCompanyChild);

        return response()->json([
            'message' => __('responses.company-child.update'),
            'data' => new DCompanyChildResource($dCompanyChild),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DCompanyChild $dCompanyChild, Request $request): JsonResponse
    {

        $this->dCompanyChildService->delete($dCompanyChild);

        return response()->json(['message' => __('responses.company-child.update'), 202]);
    }
}
