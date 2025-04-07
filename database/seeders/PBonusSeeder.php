<?php

namespace Database\Seeders;

use App\Models\PBonus;
use Illuminate\Database\Seeder;

class PBonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            // Très modestes
            [
                'type' => 0,
                'income_classe' => 0,
                'energy_classe' => null,
                'skip_count' => 0,
                'bonus_percentage' => 0.8,
                'bonus_cap' => 40000,
            ],
            [
                'type' => 0,
                'income_classe' => 0,
                'energy_classe' => null,
                'skip_count' => 1,
                'bonus_percentage' => 0.8,
                'bonus_cap' => 55000,
            ],
            [
                'type' => 0,
                'income_classe' => 0,
                'energy_classe' => null,
                'skip_count' => 2,
                'bonus_percentage' => 0.8,
                'bonus_cap' => 70000,
            ],
            // modestes
            [
                'type' => 0,
                'income_classe' => 1,
                'energy_classe' => null,
                'skip_count' => 0,
                'bonus_percentage' => 0.6,
                'bonus_cap' => 40000,
            ],
            [
                'type' => 0,
                'income_classe' => 1,
                'energy_classe' => null,
                'skip_count' => 1,
                'bonus_percentage' => 0.6,
                'bonus_cap' => 55000,
            ],
            [
                'type' => 0,
                'income_classe' => 1,
                'energy_classe' => null,
                'skip_count' => 2,
                'bonus_percentage' => 0.6,
                'bonus_cap' => 70000,
            ],
            // Intermédiaires
            [
                'type' => 0,
                'income_classe' => 2,
                'energy_classe' => null,
                'skip_count' => 0,
                'bonus_percentage' => 0.45,
                'bonus_cap' => 40000,
            ],
            [
                'type' => 0,
                'income_classe' => 2,
                'energy_classe' => null,
                'skip_count' => 1,
                'bonus_percentage' => 0.50,
                'bonus_cap' => 55000,
            ],
            [
                'type' => 0,
                'income_classe' => 2,
                'energy_classe' => null,
                'skip_count' => 2,
                'bonus_percentage' => 0.50,
                'bonus_cap' => 70000,
            ],
            // Classiques
            [
                'type' => 0,
                'income_classe' => 3,
                'energy_classe' => null,
                'skip_count' => 0,
                'bonus_percentage' => 0.30,
                'bonus_cap' => 40000,
            ],
            [
                'type' => 0,
                'income_classe' => 3,
                'energy_classe' => null,
                'skip_count' => 1,
                'bonus_percentage' => 0.35,
                'bonus_cap' => 55000,
            ],
            [
                'type' => 0,
                'income_classe' => 3,
                'energy_classe' => null,
                'skip_count' => 2,
                'bonus_percentage' => 0.35,
                'bonus_cap' => 70000,
            ],
            [
                'type' => 0,
                'income_classe' => 3,
                'energy_classe' => 5,
                'skip_count' => 0,
                'bonus_percentage' => 0.30,
                'bonus_cap' => 40000,
            ],
            [
                'type' => 0,
                'income_classe' => 3,
                'energy_classe' => 5,
                'skip_count' => 1,
                'bonus_percentage' => 0.30,
                'bonus_cap' => 55000,
            ],
            [
                'type' => 0,
                'income_classe' => 3,
                'energy_classe' => 5,
                'skip_count' => 2,
                'bonus_percentage' => 0.30,
                'bonus_cap' => 70000,
            ],
            [
                'type' => 0,
                'income_classe' => 3,
                'energy_classe' => 6,
                'skip_count' => 0,
                'bonus_percentage' => 0.30,
                'bonus_cap' => 40000,
            ],
            [
                'type' => 0,
                'income_classe' => 3,
                'energy_classe' => 6,
                'skip_count' => 1,
                'bonus_percentage' => 0.30,
                'bonus_cap' => 55000,
            ],
            [
                'type' => 0,
                'income_classe' => 3,
                'energy_classe' => 6,
                'skip_count' => 2,
                'bonus_percentage' => 0.30,
                'bonus_cap' => 70000,
            ],
            // Aucun
            [
                'type' => 0,
                'income_classe' => 4,
                'energy_classe' => null,
                'skip_count' => 0,
                'bonus_percentage' => 0,
                'bonus_cap' => 0,
            ],
            [
                'type' => 0,
                'income_classe' => 4,
                'energy_classe' => null,
                'skip_count' => 1,
                'bonus_percentage' => 0,
                'bonus_cap' => 0,
            ],
            [
                'type' => 0,
                'income_classe' => 4,
                'energy_classe' => null,
                'skip_count' => 2,
                'bonus_percentage' => 0,
                'bonus_cap' => 0,
            ],
            // BONUS TYPE 1 CLASS ENERGITIQUE
            [
                'type' => 1,
                'income_classe' => null,
                'energy_classe' => 5,
                'skip_count' => null,
                'bonus_percentage' => 0.1,
                'bonus_cap' => null,
            ],
            [
                'type' => 1,
                'income_classe' => null,
                'energy_classe' => 6,
                'skip_count' => null,
                'bonus_percentage' => 0.1,
                'bonus_cap' => null,
            ],
        ];

        PBonus::insert($array);
    }
}
