<?php

namespace Database\Seeders;

use App\Models\PWorkType;
use Illuminate\Database\Seeder;

class PWorkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $works = [
            [
                'entitled' => 'Rénovation énergétique',
                'type' => 0,
            ],
            [
                'entitled' => 'Adaptation à la perte d’autonomie et accessibilité du logement',
                'type' => 1,
            ],
            [
                'entitled' => 'Rénovation lourde',
                'type' => 2,
            ],
            [
                'entitled' => 'Autres',
                'type' => 3,
            ],
        ];
        PWorkType::insert($works);
    }
}
