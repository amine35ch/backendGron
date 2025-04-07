<?php

namespace App\Http\Controllers;

use App\Models\PNatureResidence;

class PNatureResidenceController extends Controller
{
    public function __construct(private PNatureResidence $pNatureResidence)
    {
    }

    public function index()
    {
        return $this->pNatureResidence::all();
    }
}
