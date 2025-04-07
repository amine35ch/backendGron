<?php

namespace App\Http\Controllers;

use App\Http\Requests\PSmtpRequests\PSmtpStoreRequest;
use App\Http\Requests\PSmtpRequests\PSmtpUpdateRequest;
use App\Http\Resources\PSmtpResources\PSmtpResource;
use App\Models\PSmtp;
use App\Services\PSmtpServices\PSmtpService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PSmtpController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Smtp non trouvé.';

    public function __construct(private PSmtpService $pSmtpService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $smtp = $this->pSmtpService->getCompanySmtp();

        return response()->json(
            new PSmtpResource($smtp)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PSmtpStoreRequest $request): JsonResponse
    {
        $pSmtp = $this->pSmtpService
            ->create($request->validated());

        return response()->json(
            [
                'message' => __('actions.success'),
                'data' => new PSmtpResource($pSmtp),
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PSmtp $pSmtp): JsonResponse
    {

        return response()->json(new PSmtpResource($pSmtp));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PSmtpUpdateRequest $request, PSmtp $pSmtp): JsonResponse
    {

        $this->pSmtpService->edit($request->validated(), $pSmtp);

        return response()->json([
            'message' => __('responses.smtp.update'),
            'data' => new PSmtpResource($pSmtp),
        ], 200);
    }

    public function updateCompanySmtp(PSmtpUpdateRequest $request): JsonResponse
    {
        $pSmtp = $this->pSmtpService->editCompanySmtp($request->validated());

        return response()->json([
            'message' => __('responses.smtp.update'),
            'data' => new PSmtpResource($pSmtp),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PSmtp $pSmtp, Request $request): JsonResponse
    {

        $this->pSmtpService->delete($pSmtp);

        return response()->json(['message' => __('actions.success'), 202]);
    }
}
