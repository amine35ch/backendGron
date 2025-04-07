<?php

namespace App\Http\Controllers;

use App\Models\PStatus;
use App\Services\PStatusServices\PStatusService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PStatusController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'status non trouvé.';

    public function __construct(private PStatusService $pStatusService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return response()->json(
            $this->pStatusService->getAll($request->all())
        );
    }

    public function destroy(PStatus $pStatus, Request $request): JsonResponse
    {

        $this->pStatusService->delete($pStatus);

        return response()->json(['message' => 'status est supprimé avec succée.'], 202);
    }
}
