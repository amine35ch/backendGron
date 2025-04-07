<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PTVASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => 'non_specifie',
                'entitled' => 'Non spécifiée',
                'rate' => 0,
                'sign' => null,
            ],
            [
                'code' => 'guyane_mayotte',
                'entitled' => 'Taux à 0 % (Guyane et Mayotte)',
                'rate' => 0,
                'sign' => '+',
            ],
            [
                'code' => 'guadeloupe_martinique_reunion',
                'entitled' => 'Taux réduit à 2.1 % (Guadeloupe, Martinique et la Réunion)',
                'rate' => 0.021,
                'sign' => '-',
            ],
            [
                'code' => 'reste_domtom',
                'entitled' => 'Taux réduit à 8,5 % (Le reste du DomTom)',
                'rate' => 0.085,
                'sign' => '-',
            ],
            [
                'code' => 'reduit_metropole',
                'entitled' => 'Taux réduit à 5,5 % (La Métropole)',
                'rate' => 0.055,
                'sign' => '-',
            ],
            [
                'code' => 'intermediaire_metropole',
                'entitled' => 'Taux intermédiaire à 10 % (La Métropole)',
                'rate' => 0.1,
                'sign' => '-',
            ],
            [
                'code' => 'normal_metropole',
                'entitled' => 'Taux normal à 20 % (La Métropole)',
                'rate' => 0.2,
                'sign' => '-',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\PTVA::create($item);
        }
    }
}
