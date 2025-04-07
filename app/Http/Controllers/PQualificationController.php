<?php

namespace App\Http\Controllers;

use App\Models\PQualification;
use App\Http\Requests\PQualificationRequests\PQualificationStoreRequest;
use App\Http\Requests\PQualificationRequests\PQualificationUpdateRequest;
use App\Http\Resources\PQualificationResources\PQualificationResource;
use App\Http\Resources\PQualificationResources\PQualificationCollection;
use App\Services\PQualificationServices\PQualificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PQualificationController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Qualification non trouvé.';

    public function __construct(private PQualificationService $pQualificationService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('viewAny', PQualification::class);
        $pQualifications = $this->pQualificationService->getAll($request->all());

        return response()->json(
            new PQualificationCollection($pQualifications)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(PQualificationStoreRequest $request): JsonResponse
    {
        $pQualification= $this->pQualificationService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('responses.Qualification.create'),
                'data' => new PQualificationResource($pQualification)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show(PQualification $pQualification): JsonResponse
    {
        $this->authorize('view', $pQualification);
        return response()->json(new PQualificationResource ($pQualification));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(PQualificationUpdateRequest $request, PQualification $pQualification): JsonResponse
    {

        $this->pQualificationService->edit($request->validated(), $pQualification);
        return response()->json([
            'message' => __('responses.Qualification.update'),
            'data' => new PQualificationResource ($pQualification)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(PQualification $pQualification, Request $request): JsonResponse
    {
        $this->authorize('delete', $pQualification);
        $this->pQualificationService->delete($pQualification);

        return response()->json([ 'message' => __('responses.Qualification.update'), 202]);
    }
}
