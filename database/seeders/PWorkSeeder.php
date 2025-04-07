<?php

namespace Database\Seeders;

use App\Models\PWork;
use Illuminate\Database\Seeder;

class PWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $works = [
            [
                'reference' => 'PAC air/air',
                'display_name' => 'Mise en place d\'une pompe à chaleur connecté AIR/AIR',
                'unit' => 0,
                'type' => 0,
                'pricing_list' => [
                    [
                        'price_unit_ht' => 11000,
                        'condition' => '>=0',
                    ],
                    // [
                    //     'price_unit_ht' => 22000,
                    //     'condition' => '>= 200',
                    // ],
                ],
            ],
            [
                'reference' => 'PAC air/eau',
                'display_name' => 'Mise en place d\'une pompe à chaleur connecté AIR/EAU',
                'unit' => 0,
                'type' => 1,
                'pricing_list' => [
                    [
                        'price_unit_ht' => 15000,
                        'condition' => '>=0',
                    ],
                    // [
                    //     'price_unit_ht' => 30000,
                    //     'condition' => '>= 200',
                    // ],
                ],
            ],
            [
                'reference' => 'Thermodynamique',
                'display_name' => 'Mise en place d\'un chauffe-eau thermodynamique à accumulation',
                'unit' => 0,
                'type' => 2,
                'pricing_list' => [
                    [
                        'price_unit_ht' => 6800,
                        'condition' => '>=0',
                    ],
                ],
            ],
            [
                'reference' => 'VMC double flux',
                'unit' => 0,
                'type' => 3,
                'display_name' => 'Ventilation double flux',
                'pricing_list' => [
                    [
                        'price_unit_ht' => 6500,
                        'condition' => '>=0',
                    ],
                ],
            ],
            [
                'reference' => 'Comble perdu',
                'display_name' => 'Mise en place d\'une isolation pour plancher des combles perdus',
                'unit' => 1,
                'type' => 4,
                'pricing_list' => [
                    [
                        'price_unit_ht' => 55,
                        'condition' => '>=0',
                    ],
                ],
            ],
            [
                'reference' => 'Rampants',
                'display_name' => 'Mise en place d\'une isolation pour sous rampant des combles amenageables',
                'unit' => 1,
                'type' => 5,
                'pricing_list' => [
                    [
                        'price_unit_ht' => 85,
                        'condition' => '>=0',
                    ],
                ],
            ],
            [
                'reference' => 'Plancher bas',
                'display_name' => 'Mise en place d\'une isolation pour plancher bas',
                'unit' => 1,
                'type' => 6,
                'pricing_list' => [
                    [
                        'price_unit_ht' => 45,
                        'condition' => '>=0',
                    ],
                ],
            ],
            [
                'reference' => 'ITE',
                'display_name' => 'Mise en place d\'une isolation thermique des murs extérieurs',
                'unit' => 1,
                'type' => 7,
                'pricing_list' => [
                    [
                        'price_unit_ht' => 150,
                        'condition' => '>=0',
                    ],
                ],
            ],
            [
                'reference' => 'ITI',
                'display_name' => 'Mise en place d\'une isolation thermique des murs intérieurs',
                'unit' => 1,
                'type' => 8,
                'pricing_list' => [
                    [
                        'price_unit_ht' => 85,
                        'condition' => '>=0',
                    ],
                ],
            ],
            [
                'reference' => 'VMC simple flux',
                'display_name' => 'Ventilation simple flux',
                'unit' => 0,
                'type' => 9,
                'pricing_list' => [
                    [
                        'price_unit_ht' => 6500,
                        'condition' => '>=0',
                    ],
                ],
            ],
        ];
        PWork::withoutEvents(function () use ($works) {
            foreach ($works as $work) {
                PWork::create($work);
            }
        });
    }
}
