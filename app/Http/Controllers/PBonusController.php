<?php

namespace App\Http\Controllers;

use App\Models\PBonus;

class PBonusController extends Controller
{
    public function index()
    {

        return response()->json(PBonus::all('type', 'income_classe', 'energy_classe', 'skip_count', 'bonus_cap', 'bonus_percentage'), 200);
    }
}
