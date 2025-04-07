<?php

namespace App\Http\Controllers;

use App\Models\PUnit;

class PUnitController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'type-visit non trouvé.';

    public function __construct(private PUnit $pUnit)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json(
            $this->pUnit::all()
        );
    }
}
