<?php

namespace App\Http\Controllers;

use App\Models\PProjectType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PProjectTypeController extends Controller
{
    public function __construct(private PProjectType $pProjectType)
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
            $this->pProjectType::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
}
