<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectCompanyRequests\DProjectCompanyStoreRequest;
use App\Http\Requests\DProjectCompanyRequests\DProjectCompanyUpdateRequest;
use App\Http\Resources\DProjectCompanyResources\DProjectCompanyCollection;
use App\Http\Resources\DProjectCompanyResources\DProjectCompanyResource;
use App\Models\DProjectCompany;
use App\Services\DProjectCompanyServices\DProjectCompanyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectCompanyController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-company non trouvé.';

    public function __construct(private DProjectCompanyService $dProjectCompanyService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dProjectCompanys = $this->dProjectCompanyService->getAll($request->all());

        return response()->json(
            new DProjectCompanyCollection($dProjectCompanys)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectCompanyStoreRequest $request): JsonResponse
    {
        $dProjectCompany = $this->dProjectCompanyService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.project-company.create'),
                'data' => new DProjectCompanyResource($dProjectCompany),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(DProjectCompany $dProjectCompany): JsonResponse
    {

        return response()->json(new DProjectCompanyResource($dProjectCompany));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DProjectCompanyUpdateRequest $request, DProjectCompany $dProjectCompany): JsonResponse
    {

        $this->dProjectCompanyService->edit($request->validated(), $dProjectCompany);

        return response()->json([
            'message' => __('responses.project-company.update'),
            'data' => new DProjectCompanyResource($dProjectCompany),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DProjectCompany $dProjectCompany, Request $request): JsonResponse
    {

        $this->dProjectCompanyService->delete($dProjectCompany);

        return response()->json(['message' => __('responses.project-company.update'), 202]);
    }
}
