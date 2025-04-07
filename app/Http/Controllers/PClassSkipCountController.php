<?php

namespace App\Http\Controllers;

use App\Models\PClassSkipCount;

class PClassSkipCountController extends Controller
{
    public function index()
    {
        return PClassSkipCount::all();
    }
}
