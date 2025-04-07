<?php

namespace App\Http\Controllers;

use App\Models\PWorkType;

class PWorkTypeController extends Controller
{
    public function __construct(private PWorkType $pWorkType)
    {
    }

    public function index()
    {
        return $this->pWorkType::all();
    }
}
