<?php

namespace App\Http\Controllers;

use App\Http\Requests\DProjectSemulationRequests\DProjectSemulationStoreRequest;
use App\Http\Requests\DProjectSemulationRequests\DProjectSemulationUpdateRequest;
use App\Http\Resources\DProjectSemulationResources\DProjectSemulationCollection;
use App\Http\Resources\DProjectSemulationResources\DProjectSemulationResource;
use App\Models\DInvoiceCancelComment;
use App\Models\DProjectSemulation;
use App\Services\DInvoiceCancelCommentServices\DInvoiceCancelCommentService;
use App\Services\DProjectSemulationServices\DProjectSemulationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DInvoiceCancelCommentController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'project-semulation non trouvé.';

    public function __construct(private DInvoiceCancelCommentService $dInvoiceCancelCommentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $dProjectSemulations = $this->dProjectSemulationService->getAll($request->all());

    //     return response()->json(
    //         new DProjectSemulationCollection($dProjectSemulations)
    //     );
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(DProjectSemulationStoreRequest $request): JsonResponse
    // {
    //     $dProjectSemulation = $this->dProjectSemulationService
    //         ->create($request->validated());

    //     return response()->json(
    //         [
    //             'message' => 'project-semulation a été créer avec succès.',
    //             'data' => new DProjectSemulationResource($dProjectSemulation),
    //         ],
    //         201
    //     );
    // }

    /**
     * Display the specified resource.
     */
    // public function show(DInvoiceCancelComment $DInvoiceCancelComment): JsonResponse
    // {

    //     return response()->json(new DInvoiceCancelCommentResource($DInvoiceCancelComment));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(DInvoiceCancelCommentUpdateRequest $request, DInvoiceCancelComment $DInvoiceCancelComment): JsonResponse
    // {

    //     $this->DInvoiceCancelCommentService->edit($request->validated(), $DInvoiceCancelComment);

    //     return response()->json([
    //         'message' => 'Le project-semulation est modifié avec succée.',
    //         'data' => new DInvoiceCancelCommentResource($DInvoiceCancelComment),
    //     ], 200);
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(DInvoiceCancelComment $DInvoiceCancelComment, Request $request): JsonResponse
    // {

    //     $this->DInvoiceCancelCommentService->delete($DInvoiceCancelComment);

    //     return response()->json(['message' => 'project-semulation est supprimé avec succée.'], 202);
    // }

    public function commentTraited(DInvoiceCancelComment $dInvoiceCancelComment){

        $this->dInvoiceCancelCommentService->commentTraited($dInvoiceCancelComment);

        return response()->json([
            'message' => __('actions.success'),
        ], 202);
    }
}
