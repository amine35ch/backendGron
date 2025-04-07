<?php

namespace App\Http\Controllers;

use App\Models\PBar;
use Illuminate\Http\Request;

class PBarController extends Controller
{
    public function index()
    {
        return response()->json(PBar::all('reference'));
    }
}
